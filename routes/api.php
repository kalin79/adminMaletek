<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['guest']], function(){
    Route::prefix('v1')->group( function() {
        Route::get('home', 'Api\V1\HomeController@index')->name('api.home');

        Route::post('subscription', 'Api\V1\HomeController@subscriptionStore')->name('api.subscription');

        Route::get('list-products/{categoria_slug}', 'Api\V1\GaleryProductController@productByCategories')->name('api.product_categories');
        Route::get('list-products-rubros/{rubro_slug}', 'Api\V1\GaleryProductController@productByRubro')->name('api.product_rubro');
        Route::get('producto/{slug}', 'Api\V1\ProductoController@index')->name('api.product');


        Route::get('search-product', 'Api\V1\ProductoController@searchProduct')->name('api.searchProductos');

        Route::post('catalogo', 'Api\V1\ProductoController@catalogo')->name('api.catalogo');

        Route::get('get-filters', 'Api\V1\HomeController@getFiltros')->name('api.get-filters');
      Route::post('store-cotizacion', 'Api\V1\HomeController@storeCotizacion')->name('api.store-cotizacion');
        Route::post('store-contactanos', 'Api\V1\HomeController@storeContacto')->name('api.store-contactanos');


        Route::get('articulos', 'Api\V1\HomeController@articulos')->name('api.articulos');
        Route::get('articulo/{slug_articulo}', 'Api\V1\HomeController@detalleArticulo')->name('api.detalle-articulo');

    });
});
