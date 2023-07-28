<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    public function index(Blogs $blog)
    {
        $breadcrumb = [
            [
                'name' => 'Categoría' ,
                'url' => route( 'categories.index')
            ],
            [
                'name' => 'Listado de Banners',
                'url' => '#'
            ]
        ];

        return view('pages.blogs.articulos.index',compact('breadcrumb','blog'));
    }
    public function load(Request $request, Blogs $blog)
    {

        if(!$request->ajax()) return redirect('/');
        $articulos = Articulos::where('blog_id',$blog->id)->paginate(10);
        return view('pages.blogs.articulos.partials.load',compact('articulos','blog'));
    }


    public function create(Blogs $blog)
    {
        return view('pages.blogs.articulos.modals.create',compact('blog'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blogs $blog, Request $request)
    {
        //dd($request->all());
        if(!$request->ajax()) return redirect('/');
        $data = $request->all();
        $articulo = $blog->articulos()->create($data);
        $articulo->updateImages($blog->id,$request->file('images'));
        $articulo->updateImageMobile($blog->id,$request->file('image_mobile'));

        return response()->json($articulo,201);
    }
    public function edit(Request $request, Blogs $blog, Articulos $articulo){

        return view('pages.blogs.articulos.modals.edit',compact('blog','articulo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogs $blog,Articulos $articulo)
    {
        if(!$request->ajax()) return redirect('/');
        DB::beginTransaction();
        try {
            $articulo->update($request->all());
            $articulo->updateImages($blog->id, $request->file('images'));
            $articulo->updateImageMobile($blog->id, $request->file('image_mobile'));
            DB::commit();
        } catch (Exception $exc) {
            DB::rollBack();
            abort(500);
        }
        return response()->json($articulo,202);


    }

    public function show(Request $request, Blogs $blog, Articulos $articulo){

        return view('pages.categorias.banners.show',compact('blog','articulo'));
    }

    public function desactive(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $banner = Articulos::findOrFail($request->id);
        $banner->active = 0;
        if($banner->save()){
            return response()->json(["rpt"=>1]);
        }
    }

    public function active(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $banner = Articulos::findOrFail($request->id);
        $banner->active = 1;
        if($banner->save()){
            return response()->json(["rpt"=>1]);
        }
    }

    public function destroy(Request $request,Blogs $blog, Articulos $articulo){
        if(!$request->ajax()) return redirect('/');

        DB::beginTransaction();
        try {

            $articulo->delete();

            DB::commit();
        } catch (Exception $exc) {
            DB::rollBack();

            abort(500);
        }
        return response()->json(["rpt"=>1]);
    }
}
