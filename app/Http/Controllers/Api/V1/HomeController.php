<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Enums\TypeCantidadBandejas;
use App\Http\Enums\TypeCantidadCajones;
use App\Http\Enums\TypeCantidadCuerpos;
use App\Http\Enums\TypeCantidadPuertas;
use App\Http\Enums\TypeChapas;
use App\Http\Enums\TypeMaterial;
use App\Mail\SendContactanos;
use App\Mail\SendCotizaciones;
use App\Models\Articulos;
use App\Models\Category;
use App\Models\Colores;
use App\Models\Contacto;
use App\Models\Cotizaciones;
use App\Models\Menu;
use App\Models\Producto;
use App\Models\ProductoColor;
use App\Models\Rubros;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Subscription;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Cupones;
use App\Models\Tipos;
use App\Traits\ApiResponser;

use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\DB;

class HomeController  extends Controller
{
    use ApiResponser;

    public function index( ) {

        $data                               = new \stdClass();
        //$data->menu                         = $this->menu();
        $data->slider                       = $this->banners();
        $data->categories                   = $this->categories();
        $data->recently_entered_products     = $this->products();

        $status = 1;
        $code   = 200;
        $data   = $data;

        return $this->apiResponse($status,$code,$data);
    }

    public function menu(){
        $response = [];
        $menus = Menu::where('active', 1)->orderBy('position', "asc")->orderBy('name','asc')->get();

        if ($menus && count($menus) > 0) {
            foreach ($menus as $menu) {
                $row = new \stdClass();
                $row->id           = $menu->id;
                $row->name         = $menu->name ? trim($menu->name): '';
                $row->special_date = $menu->fecha_especial;
                $row->icon         = !empty($menu->icon) ? asset('images/menus/' . $menu->icon) : '';
                $row->link         = trim($menu->link);
                $response[]        = $row;
            }
        }
        $data                               = new \stdClass();
        $data->menu                         = $response;
        $data->categories                   = $this->categories();
        $status = 1;
        $code   = 200;

        return $this->apiResponse($status,$code,$data);
    }

    public function banners(){
        $response = [];
        $data = Slider::activos()->orderBy('position')->get();
        if ($data && count($data) > 0) {
            foreach ($data as $banner) {
                $row = new \stdClass();
                $row->id = $banner->id;
                $row->title = $banner->title ? trim($banner->title): '';
                $row->descripcion = $banner->description ? trim($banner->description): '';
                $row->accion = $banner->button ? trim($banner->button): '';
                $row->image = !empty($banner->poster) ? asset('images/banners/' .$banner->id.'/'.$banner->poster) : '';
                $row->imagemobile = !empty($banner->poster_mobile) ? asset('images/banners/'.$banner->id.'/' . $banner->poster_mobile) : '';
                $row->icono = $banner->icono ? trim($banner->icono): '';
                $row->link = trim($banner->link);
                $response[] = $row;
            }
        }

        return $response;
    }

    public function categories(){
        $response = [];

        $data = Category::activos()->where('parent_id',0)->orderBy('position')->get();

        if ($data && count($data) > 0) {
            foreach ($data as $categorias) {
                $row = new \stdClass();
                $row->id = $categorias->id;
                $row->categoria = $categorias->name ? trim($categorias->name): '';
                $row->slug = $categorias->slug ? trim($categorias->slug): '';
                $row->image = !empty($categorias->poster) ? asset('images/categorias/' .$categorias->id.'/'.$categorias->poster) : '';
                $row->imagemobile = !empty($categorias->icon) ? asset('images/categorias/'.$categorias->id.'/' . $categorias->icon) : '';

                $response[] = $row;
            }
        }

        return $response;
    }

    public function occasions()
    {
        $special_occasion       = Category::where('special_occasion',true)->first();
        $response_sub_cate = [];
        if($special_occasion){
            $subCategories          = Category::where('parent_id', $special_occasion->id)
                ->orderby('position', 'asc')
                ->activos()
                ->orderBy('position')
                ->get();

            foreach ($subCategories as $subcategory) {
                $row_sub_cate = new \stdClass();
                $row_sub_cate->id = $subcategory->id;
                $row_sub_cate->title = $subcategory->name ? trim($subcategory->name): '';
                $row_sub_cate->poster = !empty($subcategory->poster) ? asset('images/categories/' .$subcategory->poster) : '';
                $row_sub_cate->link = '/'.trim($special_occasion->slug).'/'.trim($subcategory->slug);
                $response_sub_cate[] = $row_sub_cate;
            }
        }


        return $response_sub_cate;
    }

    public function products()
    {
        $response_products = [];
        $products = [];
        $products = Producto::whereHas('categoria',function ($q) {
            $q->activos();
        })->activos()
            ->orderBy('id','DESC')
            ->limit(10)
            ->get();

        if(count($products)>0){
            foreach ($products as $product) {

                $image_galeria_inicial = $product->galleries()->orderBy('order', 'asc')->first() ;

                $image_product=$image_galeria_inicial? $image_galeria_inicial->image : null;
                $row                        = new \stdClass();
                $row->id                    = $product->id;
                $row->title                 = $product->title_large ? trim($product->title_large): '';
                $row->categoria_id          = $product->categoria_id;
                $row->categoria_slug        = $product->categoria ? $product->categoria->slug : '';
                $row->categoria             = $product->categoria ? $product->categoria->name : '';
                $row->codigo                = $product->code ? trim($product->code): '';
                $row->slug                  = $product->slug ? trim($product->slug): '';
                $row->image                 = $image_product ? asset('images/products/' .$product->id.'/'.$image_product) : '';
                $row->image_cover           = !empty($product->image_cover) ? asset('images/products/'.$product->id.'/' . $product->image_cover) : '';
                $row->link                  = 'producto/'.trim($product->slug);
                $response_products[]= $row;
            }
        }


        return $response_products;

    }

    public function loadProductsOccasions($subcategory = null)
    {
        $data                               = new \stdClass();
        $data->product_special_occasion     = count($this->productsOccasions($subcategory)) > 0 ? $this->productsOccasions($subcategory) : [];

        $status = 1;
        $code   = 200;
        $data   = $data;

        return $this->apiResponse($status,$code,$data);
    }


    public function subscriptionStore(SubscriptionRequest $request)
    {
        DB::beginTransaction();
        try{
            Subscription::create(['email' => $request->email]);
            DB::commit();
        } catch(Exception $exc){
            DB::rollBack();
            $status = 0;
            $code   = 500;
            $data   = $exc;
            return $this->apiResponse($status,$code,$data);
        }

        $row                = new \stdClass();
        $row->msg           = 'suscripción realizada correctamente';

        $status = 1;
        $code   = 201;
        $data   = $row;

        return $this->apiResponse($status,$code,$data);
    }

    public function getFiltros(Request $request){
        $categoria = null;
        $rubro = null;
        if(isset($request->slug_categoria)){
            $categoria = Category::where('slug',$request->slug_categoria)->where('parent_id',0)->activos()->first();
        }

        if(isset($request->slug_rubro)){
            $rubro = Rubros::where('slug',$request->slug_rubro)->activos()->first();
        }

        $data= new \stdClass();
        if($categoria || $rubro){
            if($this->getColoresFiltro($categoria,$rubro)>0){
                $data->colores                               = $this->getColoresFiltro($categoria,$rubro);
            }


            if(count($this->getTiposByMaster(TypeChapas::master(),'tipo_cerradura',$categoria,$rubro))>0){
                $data->tipo_cerraduras                       = $this->getTiposByMaster(TypeChapas::master(),'tipo_cerradura',$categoria,$rubro);
            }

            if(count($this->getTiposByMaster(TypeCantidadPuertas::master(),'tipo_cantidad_puertas_id',$categoria,$rubro))>0){
                $data->tipo_cantidad_puertas                 = $this->getTiposByMaster(TypeCantidadPuertas::master(),'tipo_cantidad_puertas_id',$categoria,$rubro);
            }

            if(count($this->getTiposByMaster(TypeCantidadCuerpos::master(),'tipo_cantidad_cuerpos_id',$categoria,$rubro))>0){
                $data->tipo_cantidad_cuerpos                 = $this->getTiposByMaster(TypeCantidadCuerpos::master(),'tipo_cantidad_cuerpos_id',$categoria,$rubro);
            }

            if(count($this->getTiposByMaster(TypeCantidadBandejas::master(),'tipo_cantidad_bandejas_id',$categoria,$rubro))>0){
                $data->tipo_cantidad_bandejas                 = $this->getTiposByMaster(TypeCantidadBandejas::master(),'tipo_cantidad_bandejas_id',$categoria,$rubro);
            }

            if(count($this->getTiposByMaster(TypeCantidadCajones::master(),'tipo_cantidad_cajones_id',$categoria,$rubro))>0){
                $data->tipo_cantidad_cajones                 = $this->getTiposByMaster(TypeCantidadCajones::master(),'tipo_cantidad_cajones_id',$categoria,$rubro);
            }

            if(count($this->getTiposByMaster(TypeMaterial::master(),'tipo_material_id',$categoria,$rubro))>0){
                $data->tipo_material                         = $this->getTiposByMaster(TypeMaterial::master(),'tipo_material_id',$categoria,$rubro);
            }
        }



        $status = 1;
        $code   = 200;
        $data   = $data;

        return $this->apiResponse($status,$code,$data);
    }


    public function getTiposByMaster($master,$columna,$categoria,$rubro){
        $tipos = Tipos::byMasterId($master)->get();
        $response = [];
        foreach ($tipos as $tipo) {
            $row = new \stdClass();


            if($categoria){
                $productos =  Producto::activos()->where('categoria_id',$categoria->id);
            }

            if($rubro){
                $productos =  Producto::whereHas('rubros',function ($q) use ($rubro){
                    $q->where('rubro_id',$rubro->id);
                })->activos();
            }

            $productos =  $productos->Where($columna,$tipo->id);
            /*if($master==1){
                $productos =  $productos->Where('tipo_cantidad_puertas_id',$tipo->id);
            }
            if($master==2){
                $productos =  $productos->Where('tipo_cantidad_cuerpos_id',$tipo->id);
            }
            if($master==3){
                $productos =  $productos->Where('tipo_cantidad_cajones_id',$tipo->id);
            }
            if($master==4){
                $productos =  $productos->Where('tipo_material_id',$tipo->id);
            }
            if($master==5){
                $productos =  $productos->Where('tipo_cantidad_bandejas_id',$tipo->id);
            }
            if($master==6){
                $productos =  $productos->Where('tipo_cerradura',$tipo->id);
            }*/
                 $productos = $productos->count();
            if($productos>0){
                $row->id           = $tipo->id;
                $row->name         = $tipo->name;
                $row->count_product = $productos;
                $response[]        = $row;
            }


        }

        return $response;

    }




    public function getColoresFiltro($categoria,$rubro){
        $response = [];
        $colores = Colores::all();

        if ($colores && count($colores) > 0) {
            foreach ($colores as $color) {
                $row = new \stdClass();
                $producto_ids = ProductoColor::where('color_id',$color->id)->pluck('producto_id')->toArray();
                $productos = Producto::whereIn('id',$producto_ids);
                if($categoria){
                    $productos =  $productos->where('categoria_id',$categoria->id)->activos();
                }

                if($rubro){
                    $productos =  $productos->whereHas('rubros',function ($q) use ($rubro){
                        $q->where('rubro_id',$rubro->id);
                    })->activos();
                }

                $productos =  $productos->count();
                if($productos>0){
                    $row->id           = $color->id;
                    $row->name         = $color->nombre ? trim($color->nombre): '';
                    $row->valor         = $color->valor;
                    $row->count_product = $productos;
                    $response[]        = $row;
                }

            }
        }
        return $response;
    }


    public function storeCotizacion(Request $request)
    {
        DB::beginTransaction();
        try{

            $cotizaciones=Cotizaciones::create($request->all());

            $data['producto']=Producto::find($cotizaciones->producto_id)->titulo_large;
            $data['cantidad']=$cotizaciones->cantidad;
            $data['nombres_apellidos']=$cotizaciones->nombres_apellidos;
            $data['numero_documento']=$cotizaciones->numero_documento;
            $data['email']=$cotizaciones->email;
            $data['celular']=$cotizaciones->celular;
            $data['comentario']=$cotizaciones->comentario;

            //Financiamiento::create($request->all());

            $email = ["seguroscamilacorp@gmail.com","hola@motopopular.com",'c.augusto.espinoza@gmail.com'];
            //$email="pedromollehuanca@gmail.com";

            Mail::to($email)->send(new SendCotizaciones($data));
            DB::commit();
        } catch(Exception $exc){
            DB::rollBack();
            $status = 0;
            $code   = 500;
            $data   = $exc;
            return $this->apiResponse($status,$code,$data);
        }

        $row                = new \stdClass();
        $row->msg           = 'Cotización realizada correctamente';

        $status = 1;
        $code   = 201;
        $data   = $row;

        return $this->apiResponse($status,$code,$data);
    }

    public function storeContacto(Request $request)
    {
        DB::beginTransaction();
        try{
            $contacto=Contacto::create($request->all());

            $data['nombres_apellidos']=$contacto->nombres_apellidos;
            $data['numero_documento']=$contacto->numero_documento;
            $data['email']=$contacto->email;
            $data['celular']=$contacto->celular;
            $data['comentario']=$contacto->comentario;

            //Financiamiento::create($request->all());
            //    dd($data);
            $email = ["seguroscamilacorp@gmail.com","hola@motopopular.com",'c.augusto.espinoza@gmail.com'];
            //$email="pedromollehuanca@gmail.com";

            Mail::to($email)->send(new SendContactanos($data));
            DB::commit();
        } catch(Exception $exc){
            DB::rollBack();
            $status = 0;
            $code   = 500;
            $data   = $exc;
            return $this->apiResponse($status,$code,$data);
        }

        $row                = new \stdClass();
        $row->msg           = 'Contacto realizada correctamente';

        $status = 1;
        $code   = 201;
        $data   = $row;

        return $this->apiResponse($status,$code,$data);
    }

    public function articulos(){
        $response_products = [];
        $products = [];
        $products = Articulos::activos()
            ->orderBy('id','DESC')
            ->limit(10)
            ->get();

        if(count($products)>0){
            foreach ($products as $product) {
                //dd(date("n",strtotime($product->fecha)));
                $row                        = new \stdClass();
                $row->id                    = $product->id;
                $row->title                 = $product->titulo ? trim($product->titulo): '';
                $row->hashtag               = $product->etiqueta;
                $row->fecha                 = date("d",strtotime($product->fecha))." ". mesCastellanoAbreviado(date("n",strtotime($product->fecha)))." ".date("Y",strtotime($product->fecha));
                $row->sub_titulo          = $product->sub_titulo;
                $row->descripcion_corta        = $product->descripcion_corta ? $product->descripcion_corta: '';
                $row->slug                  = $product->slug ? trim($product->slug): '';
                $row->image                 = $product->imagen_portada ? asset('images/articulos/' .$product->id.'/'.$product->imagen_portada) : '';
                 $row->link                  = 'articulo/'.$product->slug;
                $response_products[]= $row;
            }
        }


        return $response_products;
    }

    public function detalleArticulo(Request $request){

        $articulo = Articulos::where('slug',$request->slug_articulo)
            ->first();
        $row                        = new \stdClass();
        if($articulo){


                $row->id                    = $articulo->id;
                $row->titulo                 = $articulo->titulo ? trim($articulo->titulo): '';
                $row->sub_titulo          = $articulo->sub_titulo;
                $row->fecha                 = date("d",strtotime($articulo->fecha))." ". mesCastellanoAbreviado(date("n",strtotime($articulo->fecha)))." ".date("Y",strtotime($articulo->fecha));

                $row->descripcion          = $articulo->contenido ? $articulo->contenido: '';
                $row->slug                  = $articulo->slug ? trim($articulo->slug): '';
                $row->imagen_banner                 = $articulo->imagen_banner ? asset('images/articulos/' .$articulo->id.'/'.$articulo->imagen_banner) : '';
                $row->imagen_banner_mobile                 = $articulo->imagen_banner_mobile ? asset('images/articulos/' .$articulo->id.'/'.$articulo->imagen_banner_mobile) : '';

        }


        return $row;
    }

}
