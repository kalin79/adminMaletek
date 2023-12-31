<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Marcas;
use App\Models\Producto;
use App\Models\ProductoCerradura;
use App\Models\ProductoColorImage;
use App\Models\ProductoLike;
use App\Models\Rubros;
use App\Traits\ApiResponser;

use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\DB;

class ProductoController  extends Controller
{
    use ApiResponser;

    public function index($slug)
    {
        $producto = Producto::where('slug', '=', $slug)->firstOrFail();

        $data                               = new \stdClass();
        $data->product                      = $this->producto($producto);
        $data->related_products             = $this->relatedProducts($producto);
        $status = 1;
        $code   = 200;
        $data   = $data;

        return $this->apiResponse($status, $code, $data);
    }

    public function producto(Producto $producto,$all_data=true)
    {
        // dd(1);

        $row                = new \stdClass();
        $row->id                    = $producto->id;
        $row->title                 = $producto->title_large ? trim($producto->title_large): '';
        $row->categoria_id          = $producto->categoria_id;
        $row->categoria_slug        = $producto->categoria ? $producto->categoria->slug : '';
        $row->categoria             = $producto->categoria ? $producto->categoria->name : '';
        $row->codigo                = $producto->code ? trim($producto->code): '';
        $row->slug                  = $producto->slug ? trim($producto->slug): '';
        $row->image                 = $producto->path_image_default;
        $row->image_cover           = !empty($producto->image_cover) ? asset('images/products/'.$producto->id.'/' . $producto->image_cover) : '';
        $row->link                  = 'producto/'.trim($producto->slug);

        if($all_data) {
            $row->descripcion = $producto->description;
            $row->usos = $producto->conditions;
            $row->alto = $producto->alto;
            $row->ancho = $producto->ancho;
            $row->fondo = $producto->fondo;
            $row->cantidad_puertas = $producto->tipoCantidadPuerta ? $producto->tipoCantidadPuerta->name : '';
            $row->alto_puerta = $producto->alto_puerta;
            $row->ancho_puerta = $producto->ancho_puerta ;
            $row->material = $producto->tipoMaterial? $producto->tipoMaterial->name : '';
            $row->pintura = $producto->pintura;
            $row->puerta_reforsada = $producto->puerta_reforsada == 1? 'SI' : 'NO';
            $row->tipo_cerradura = $this->tipoCerraduras($producto);
            $row->cuerpos = $producto->tipoCantidadCuerpos ? $producto->tipoCantidadCuerpos ->name : '';
            $row->cantidad_bandejas = $producto->tipoCantidadBandejas ? $producto->tipoCantidadBandejas ->name : '';
            $row->cantidad_cajones = $producto->tipoCantidadCajones ? $producto->tipoCantidadCajones ->name : '';
            $row->bisagras = $producto->bisagras;
            $row->accesor = $producto->accesorios;
            $row->ventilacion = $producto->ventilacion;
            $row->garantia = $producto->garantia;
            $row->galleries = $this->galleryProduct($producto);
            $row->colores = $this->productoColores($producto);
            $row->ficha_tecnica = !empty($producto->ficha_tecnica) ? asset('images/products/' . $producto->id . '/documentos/' . $producto->ficha_tecnica) : null;
        }
        return $row;
    }

    public function tipoCerraduras($producto){
        $response = [];
        $data = ProductoCerradura::where('producto_id',$producto->id)->get();

        if ($data && count($data) > 0) {
            foreach ($data as $tipo_cerradura) {
                $row = new \stdClass();
                $row->id = $tipo_cerradura->id;
                $row->tipo_cerradura = $tipo_cerradura->tipoCerradura->name ? trim($tipo_cerradura->tipoCerradura->name): '';
                $response[] = $row;
            }
        }

        return $response;
    }

    public function galleryProduct(Producto $product)
    {

        $gallery= $product->loadGallery();
        $response_gallery = [];
        foreach ($gallery as $imagen) {
            $response_gallery[]   = !empty($imagen->image) ? asset('images/products/' . $product->id . '/' . $imagen->image) : '';;
        }
        return $response_gallery;
    }

    public function productosMasVistos(Marcas $marca){
        $response = [];
        $data = Producto::activos()->where('es_mas_visto',1)->where('marca_id',$marca->id)->orderBy('titulo')->get();
        if ($data && count($data) > 0) {
            foreach ($data as $producto) {
                $image_default = ProductoColorImage::where('is_default',1)->with('productoColor')->whereHas('productoColor',function($query)use($producto){
                    $query->where('producto_id',$producto->id);
                })->first();
                $count_product_like = ProductoLike::where('producto_id',$producto->id)->where('ip',request()->ip())->count();
                $row = new \stdClass();
                $row->id = $producto->id;
                $row->title = $producto->titulo ? trim($producto->titulo): '';
                $row->image         = !empty($image_default->imagen) ? asset('images/products/'.$producto->id.'/'.$image_default->productoColor->color->nombre.'/' . $image_default->imagen) : '';
                $row->precio        = $producto->precio;
                $row->marca         = $producto->marca ? $producto->marca->nombre : '';
                $row->slug         = trim($producto->slug);
                $row->has_like      = $count_product_like>0 ? true:false;
                $row->count_like    = $count_product_like;
                $response[] = $row;
            }
        }

        return $response;
    }


    public function productoColores(Producto $product)
    {
        $colores = $product->colores;
        $response = [];
        foreach ($colores as $colors) {
            $producto_color_image = ProductoColorImage::where('producto_color_id',$colors->id)->first();
            $row = new \stdClass();
            $row->id = $colors->id;
            $row->color = $colors->color->nombre;
            $row->color_estilo = $colors->color->valor;
            $row->image         = !empty($producto_color_image->imagen) ? asset('images/products/'.$product->id.'/'.$producto_color_image->productoColor->color->nombre.'/' . $producto_color_image->imagen) : '';
            $response[] = $row;
        }
        return $response;
    }

    public function catalogo(Request $request){
        //dd($request->all());
        $categoria = null;
        $rubro = null;
        if(isset($request->slug_categoria)){
            $categoria = Category::where('slug',$request->slug_categoria)->where('parent_id',0)->activos()->first();
        }

        if(isset($request->slug_rubro)){
            $rubro = Rubros::where('slug',$request->slug_rubro)->activos()->first();
        }

        $response = [];
        if($categoria || $rubro){

            $data = Producto::activos();
            if($categoria){
                $data =  $data->where('categoria_id',$categoria->id);
            }

            if($rubro){
                $data =  $data->whereHas('rubros',function ($q) use ($rubro){
                    $q->where('rubro_id',$rubro->id);
                });
            }


            if(!empty($request->tipoCerradura)){
                $array_tipo_cerradura_id= explode(',',$request->tipoCerradura);
                //dd($array_tipo_cerradura_id);
                /*$data = $data->where(function($query) use ($array_tipo_cerradura_id){
                    foreach ($array_tipo_cerradura_id as $key => $tipo_cerradura_id) {

                        $query->orWhere('tipo_cerradura', $tipo_cerradura_id);
                    }
                });*/

                $data = $data->whereHas('tipoCerraduras',function($query) use ($array_tipo_cerradura_id){

                    $query->where(function($queryB) use ($array_tipo_cerradura_id){
                        foreach ($array_tipo_cerradura_id as $key => $tipo_cerradura_id) {
                            $queryB->orWhere('tipo_cerradura_id', $tipo_cerradura_id);
                        }
                    });
                });
            }


            if(!empty($request->tipoCantidadPuertas)){
                $array_cantidad_puertas_id= explode(',',$request->tipoCantidadPuertas);
                $data = $data->where(function($query) use ($array_cantidad_puertas_id){
                    foreach ($array_cantidad_puertas_id as $key => $cantidad_puertas_id) {
                        $query->orWhere('tipo_cantidad_puertas_id', $cantidad_puertas_id);
                    }
                });
            }

            if(!empty($request->tipoCantidadCuerpos)){
                $array_tipo_cantidad_cuerpos_id= explode(',',$request->tipoCantidadCuerpos);
                $data = $data->where(function($query) use ($array_tipo_cantidad_cuerpos_id){
                    foreach ($array_tipo_cantidad_cuerpos_id as $key => $cantidad_cuerpos_id) {
                        $query->orWhere('tipo_cantidad_cuerpos_id', $cantidad_cuerpos_id);
                    }
                });
            }

            if(!empty($request->tipoCantidadCajones)){
                $array_cantidad_cajones_id= explode(',',$request->tipoCantidadCajones);
                $data = $data->where(function($query) use ($array_cantidad_cajones_id){
                    foreach ($array_cantidad_cajones_id as $key => $cantidad_cajones) {
                        $query->orWhere('tipo_cantidad_cajones_id', $cantidad_cajones);
                    }
                });
            }

            if(!empty($request->tipoMaterial)){
                $array_tipo_material_id= explode(',',$request->tipoMaterial);
                $data = $data->where(function($query) use ($array_tipo_material_id){
                    foreach ($array_tipo_material_id as $key => $tipo_material_id) {
                        $query->orWhere('tipo_material_id', $tipo_material_id);
                    }
                });
            }

            if(!empty($request->tipoCantidadBandejas)){
                $array_tipo_cantidad_bandejas_id= explode(',',$request->tipoCantidadBandejas);
                $data = $data->where(function($query) use ($array_tipo_cantidad_bandejas_id){
                    foreach ($array_tipo_cantidad_bandejas_id as $key => $tipo_cantidad_bandejas_id) {
                        $query->orWhere('tipo_cantidad_bandejas_id', $tipo_cantidad_bandejas_id);
                    }
                });
            }


            $array_colores_id = [];
            if(!empty($request->colores)){
                $array_colores_id= explode(',',$request->colores);
                $data = $data->whereHas('colores',function($query) use ($array_colores_id){

                    $query->where(function($queryB) use ($array_colores_id){
                        foreach ($array_colores_id as $key => $color_id) {
                            $queryB->orWhere('color_id', $color_id);
                        }
                    });
                });
            }

            $data=$data->get();


            if ($data && count($data) > 0) {

                if(count($array_colores_id)>0){
                    //dd($data);
                    foreach ($data as $producto) {

                        $productos_color_image = ProductoColorImage::where('is_default',1)->whereHas('productoColor',function($query)use($producto,$array_colores_id){
                                $query->where('producto_id',$producto->id);
                                $query->whereIn('color_id',$array_colores_id);
                            })->get();
                        foreach ($productos_color_image as $image_default){
                            $row = new \stdClass();
                            $row->id                    = $producto->id;
                            $row->title                 = $producto->title_large ? trim($producto->title_large): '';
                            $row->categoria_id          = $producto->categoria_id;
                            $row->categoria_slug        = $producto->categoria ? $producto->categoria->slug : '';
                            $row->categoria             = $producto->categoria ? $producto->categoria->name : '';
                            $row->codigo                = $producto->code ? trim($producto->code): '';
                            $row->slug                  = $producto->slug ? trim($producto->slug): '';
                            //$row->image                 = $producto->path_image_default;
                            $row->image         = !empty($image_default->imagen) ? asset('images/products/'.$producto->id.'/'.$image_default->productoColor->color->nombre.'/' . $image_default->imagen) : '';
                            $row->image_cover           = !empty($producto->image_cover) ? asset('images/products/'.$producto->id.'/' . $producto->image_cover) : '';
                            $row->link                  = 'producto/'.trim($producto->slug);
                            $row->colores       = $this->productoColores($producto);
                            $response[] = $row;
                        }
                    }
                }else{
                    foreach ($data as $producto) {
                        $image_galeria_inicial = $producto->galleries()->orderBy('order', 'asc')->first() ;

                        $image_default=$image_galeria_inicial? $image_galeria_inicial->image : null;

                        $row = new \stdClass();
                        $row->id                    = $producto->id;
                        $row->title                 = $producto->title_large ? trim($producto->title_large): '';
                        $row->categoria_id          = $producto->categoria_id;
                        $row->categoria_slug        = $producto->categoria ? $producto->categoria->slug : '';
                        $row->categoria             = $producto->categoria ? $producto->categoria->name : '';
                        $row->codigo                = $producto->code ? trim($producto->code): '';
                        $row->slug                  = $producto->slug ? trim($producto->slug): '';
                        //$row->image                 = $producto->path_image_default;
                        $row->image         = $image_default ? asset('images/products/' .$producto->id.'/'.$image_default) : '';
                        $row->image_cover           = !empty($producto->image_cover) ? asset('images/products/'.$producto->id.'/' . $producto->image_cover) : '';
                        $row->link                  = 'producto/'.trim($producto->slug);
                        $row->colores       = $this->productoColores($producto);
                        $response[] = $row;
                    }
                }

            }
        }
        return $response;
    }

    public function productoLike(Request $request){

        DB::beginTransaction();
        try{
            $productLike = ProductoLike::where('producto_id',$request->producto_id)->where('ip',request()->ip())->orderBy('id','DESC')->first();
            if ($productLike){
                $productLike->delete();
            }else{
                ProductoLike::create(['producto_id' => $request->producto_id,'ip'=> request()->ip()]);
            }
            DB::commit();
        } catch(Exception $exc){
            DB::rollBack();
            $status = 0;
            $code   = 500;
            $data   = $exc;
            return $this->apiResponse($status,$code,$data);
        }

        $data                = new \stdClass();
        $data->count_like           = ProductoLike::where('producto_id',$request->producto_id)->where('ip',request()->ip())->count();

        $status = 1;
        $code   = 201;
        $data   = $data;

        return $this->apiResponse($status,$code,$data);

    }


    //en la relacion de categorìa solo enviar el nombre
    public function relatedProducts(Producto $product)
    {
        $related_products = $product->relationProduct()->get()->pluck('product_relation_id')->toArray();
        $products = Producto::activos()->whereIn('id', $related_products)->get();

        $response_products = [];
        foreach ($products as $product) {
            $response_products[]   = $this->producto($product, false);
        }
        return $response_products;
    }

    public function complementaryProducts(Producto $product)
    {
        $complementary_products = $product->complementaryProduct()->get()->pluck('product_complementary_id')->toArray();
        $products               = Product::activos()->whereIn('id', $complementary_products)->get();

        $response_products = [];
        foreach ($products as $product) {
            $response_products[]   = $this->producto($product,false);
        }
        return $response_products;
    }

    public function searchProduct(Request $request)
    {
        if ($request->valor) {
            $categoria = null;
            $rubro = null;
            if(isset($request->slug_categoria)){
                $categoria = Category::where('slug',$request->slug_categoria)->where('parent_id',0)->activos()->first();
            }

            if(isset($request->slug_rubro)){
                $rubro = Rubros::where('slug',$request->slug_rubro)->activos()->first();
            }

            //dd($categoria,$rubro);
            $response = [];
            if($categoria || $rubro){



                $products = Producto::where('title_large', 'like', '%' . $request->valor . '%')
                    ->orWhere('code', 'like', '%' . $request->valor . '%')
                    ->orWhere('slug', 'like', '%' . $request->valor . '%')
                    ->orWhere('description', 'like', '%' . $request->valor . '%')
                    ->activos();
                if($categoria){
                    $products =  $products->where('categoria_id',$categoria->id);
                }

                if($rubro){
                    $products =  $products->whereHas('rubros',function ($q) use ($rubro){
                            $q->where('rubro_id',$rubro->id);
                        });
                }
                $products=$products->paginate(8);
                $data = [];
                foreach ($products as $product) {
                    $data[] = $this->producto($product, false);
                }

                $response = [
                    'status' => 1,
                    'code' => 200,
                    'msg' => 'OK',
                    'data' => $data,
                    'pagination' => [
                        'total' => $products->total(),
                        'current_page' => $products->currentPage(),
                        'per_page' => $products->perPage(),
                        'last_page' => $products->lastPage(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ],
                    'data_error' => []
                ];
            }else{
                $response = [
                    'status' => 0,
                    'code' => 200,
                    'msg' => 'OK',
                    'data' => [],
                    'data_error' => ['msg'=>'No se encontro registros']
                ];
            }

        }else{
            $response = [
                'status' => 0,
                'code' => 200,
                'msg' => 'OK',
                'data' => [],
                'data_error' => ['msg'=>'No se encontro registros']
            ];
        }
        return response()->json($response);
    }





}
