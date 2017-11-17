<?php

namespace App\Http\Controllers;

use App\Category;
use App\Filter;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class productController extends Controller
{
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
//        $products = Product::all();
//        foreach ($products as $product){
//            foreach ($product->filterv as $filterv){
//                $filter_name = $filterv->filter['filter_name'];
//               $product->filters[$filter_name] = $filterv->fv_value;
//            }
//        }
        $products = Product::with('filterv.filter')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = Filter::lists('filter_name', 'filter_id')->toArray();
        $categories = Category::lists('cat_name', 'cat_id')->toArray();

        return view('product.add', compact('filters', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = new Product;
        $input->p_name = $request->p_name;
        $input->p_categoryid = $request->p_categoryid;
        $input->p_price = $request->p_price;
        $input->p_description = $request->p_description;
        $input->p_code = $request->p_code;
        $input->p_discount = $request->p_discount;
        $input->p_addedby = Auth::user()->user_id;
        $input->p_created = date("Y-m-d h:i:s");
        $input->save();
        $input->filterv()->attach($request->filterVal);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);
        if(!$product){
            return redirect('products');
        }else{
            $filters = Filter::lists('filter_name', 'filter_id');
            $categories = Category::lists('cat_name', 'cat_id');
            $filtervalues = [];
            $filterc = new filterController();
            foreach($product->filterv as $filterss){
                $filtervalues[$filterss->fv_filterid] = [$filterss->fv_id,  $filterc->show($filterss->fv_filterid)];
            }
            return view('product.edit', compact('filters', 'product','filtervalues',  'categories'));
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
        $product = Product::find($id);
        if(!$product){
            return redirect('products');
        }else{
            $input = $request->all();
            $filtervalues = $input['filterVal'];
            unset($input['filterVal'], $input['filter']);
            $product->update($input);
            $product->filterv()->sync($filtervalues);
            return redirect('products');
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
        $product = Product::find($id);
        if(!$product){
            return redirect('products');
        }else{
            $product->filterv()->detach();
            $product->delete();
            return redirect('products');
        }

    }


}
