<?php

namespace App\Imports;

use App\Models\Csi\Clients;
use App\Models\Csi\Purchases;
use App\Models\Socios;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToArray;
class ClientImport implements ToArray
{
    private $rows = 0;
    public $response = ["result" => 1, "message" => ''];
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
    public function array(array $array)
    {
        $products = $array[0];
        //dd($products);
        //DB::beginTransaction();
        $new_products_ids = [];
        //try {
            $new_products = [];
            foreach ($products as $line => $product) {

                if ($line > 0) {

                    $dni = $product[0];

                    $vocativo = trim($product[1]);
                    $nombre = trim($product[2]);

                    $tipo_tarjeta = trim($product[3]);
                    $capana = trim($product[4]);
                    $cumpleanos = explode("/",trim($product[5]));
                    //dd($cumpleanos);
                    $anio = $cumpleanos[2];
                    $mes = $cumpleanos[1];
                    $dia = $cumpleanos[0];
                    $fecha_cumple = $anio."-".$mes."-".$dia;
                    if($dni){
                        $obCliente = Socios::where('dni', $dni)->first();
                        $id_cliente = null;
                        if (!$obCliente) {

                            $array_data_cliente = [
                                'dni' => encrypt($dni), //encriptacion dni
                                'vocativo'=>$vocativo,
                                'nombre' => $nombre,
                                'campana' => $capana,
                                'cumpleanos' => date("Y-m-d",strtotime($fecha_cumple)),
                                'tipo_tarjeta'=>$tipo_tarjeta,
                                'estado' => 1,
                            ];
                            $cliente_creado = Socios::create($array_data_cliente);
                            
                        } 
                        

                        ++$this->rows;
                    }

                }
            }
            /*DB::commit();

            $this->response = ["result" => 1, "message" => ""];

        } catch (\Exception $e) {
            DB::rollback();
            $this->response = ["result" => 0, "message" => "No se pudo realizar la importación: ".$e->getMessage()];
            return false;
        }*/



    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
