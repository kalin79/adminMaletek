<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request){
        //dd($category->id);
        return view('pages.blogs.index',);
    }
    public function load(Request $request){

        if(!$request->ajax()) return redirect('/');
        //dd($request->parent_id);
        $articulos = Articulos::orderBy('id', 'asc')
            ->paginate("20");
        return view('pages.blogs.partials.load',compact('articulos'));
    }



    public function create(Request $request){
        return view('pages.blogs.modals.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if(!$request->ajax()) return redirect('/');
        //if($request->parent_id==0)


        $data = $request->all();
        $data['slug'] = Str::slug($data['titulo']);
        $articulo = Articulos::create($data);
        $articulo->updateImages($request->file('imagen_banner'));
        $articulo->updateImageMobile($request->file('imagen_banner_mobile'));
        $articulo->updateImagePortada($request->file('imagen_portada'));
        $articulo->save();

        return response()->json($articulo,201);
    }
    public function edit(Request $request, Category $category){

        return view('pages.blogs.modals.edit',compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Articulos $articulo)
    {
        if(!$request->ajax()) return redirect('/');
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['name']);
            $articulo->update($data);
            $articulo->updateImages($request->file('images'));
            $articulo->updateImageMobile($request->file('image_mobile'));
            DB::commit();
        } catch (Exception $exc) {
            DB::rollBack();
            abort(500);
        }
        return response()->json($articulo,202);


    }

    /*public function show(Request $request, Slider $banner){

        return view('pages.banners.show',compact('banner'));
    }*/

    public function desactive(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $articulo = Articulos::findOrFail($request->id);
        $articulo->active = 0;
        if($articulo->save()){
            return response()->json(["rpt"=>1]);
        }
    }

    public function active(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $articulo = Articulos::findOrFail($request->id);
        $articulo->active = 1;
        if($articulo->save()){
            return response()->json(["rpt"=>1]);
        }
    }

    public function destroy(Request $request, Articulos $articulo){
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
