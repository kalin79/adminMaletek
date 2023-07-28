<?php

namespace App\Http\Controllers;

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
        $blogs = Blogs::withCount(['articulos'])->orderBy('id', 'asc')
            ->paginate("20");
        return view('pages.blogs.partials.load',compact('blogs'));
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
        $category = Blogs::create($data);
        $category->updateImages($request->file('images'));
        $category->updateImageMobile($request->file('image_mobile'));
        $category->save();

        return response()->json($category,201);
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
    public function update(Request $request,Category $category)
    {
        if(!$request->ajax()) return redirect('/');
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['name']);
            $category->update($data);
            $category->updateImages($request->file('images'));
            $category->updateImageMobile($request->file('image_mobile'));
            DB::commit();
        } catch (Exception $exc) {
            DB::rollBack();
            abort(500);
        }
        return response()->json($category,202);


    }

    /*public function show(Request $request, Slider $banner){

        return view('pages.banners.show',compact('banner'));
    }*/

    public function desactive(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $category = Blogs::findOrFail($request->id);
        $category->active = 0;
        if($category->save()){
            return response()->json(["rpt"=>1]);
        }
    }

    public function active(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $category = Blogs::findOrFail($request->id);
        $category->active = 1;
        if($category->save()){
            return response()->json(["rpt"=>1]);
        }
    }

    public function destroy(Request $request, Blogs $blog){
        if(!$request->ajax()) return redirect('/');

        DB::beginTransaction();
        try {

            $blog->delete();

            DB::commit();
        } catch (Exception $exc) {
            DB::rollBack();

            abort(500);
        }
        return response()->json(["rpt"=>1]);
    }



}
