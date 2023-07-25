<?php

namespace App\Exports;

use App\Models\Csi\Purchases;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class RefinancimientoExport implements FromView, ShouldAutoSize, WithTitle, WithEvents
{
    var $numref;
    public function __construct()
    {


    }

    public function view(): View
    {
        $refinanciados = Purchases::whereHas('refinanciamiento')->where('refinanciado',1)->get()->sortByDesc(function($compra){
            return $compra->refinanciamiento->refinanciemintoCabecera->id;
        });
        //$clientes = Cliente::all();
        $this->numref = count($refinanciados);

        return view('export.productos-refinanciados', [
            'compras' => $refinanciados,
        ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        // TODO: Implement title() method.
        return 'Productos refinanciados' ;
    }
    /**
     * @inheritDoc
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],

                    ]
                ];
                $styleArrayCabecera =
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['argb' => '007bff']
                        ],
                        'font' => [
                            'bold' => true,
                            'color' => ['argb' => 'FFFFFF']
                        ]
                    ];
                $event->sheet->getDelegate()->getStyle('A1:W1')->applyFromArray($styleArrayCabecera);
                $event->sheet->getDelegate()->getStyle('A1:W' . ($this->numref+1))->applyFromArray($styleArray);


            },
        ];
    }
}
