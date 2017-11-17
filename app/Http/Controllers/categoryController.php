<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class categoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input->cat_created = date("Y-m-d h:i:s");
        if(isset($request->cat_image) && $request->cat_image != '') {
            $input['cat_image'] = $this->upload($request->cat_image);
        }
        $input['added_by'] = Auth::user()->user_id;
        Category::create($input);
        return redirect('categories');
    }

    /**
     * upladong function file
     **/
    public function upload($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $date = date('Y-m-d-h-i-s');
        $filename = $date."_".$sha1.".".$extension;
        $path = public_path('images/categories/');
        $file->move($path, $filename);
        return $filename;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect('categories');
        }else{
            return view('category.edit', compact('category'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect('categories');
        }else{
            $input = $request->all();
            if(isset($request->cat_image) && $request->cat_image != '') {
                $input['cat_image'] = $this->upload($request->cat_image);
            }
            $category->update($input);
            return redirect('categories');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect('categories');
        }else{
            $category->delete();
            return redirect('categories');
        }

    }

}
