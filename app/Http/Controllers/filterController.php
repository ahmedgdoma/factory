<?php

namespace App\Http\Controllers;

use App\Filter;
use Illuminate\Http\Request;

use App\Http\Requests;

class filterController extends Controller
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
        $filters = Filter::all();
        return view('filter.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filter.add');
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
        $input['added_by'] = Auth::user()->user_id;
        $input->filter_created = date("Y-m-d h:i:s");
        Filter::create($input);
        return redirect('filters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filter = Filter::find($id);
        if(!$filter){
            return redirect('filters');
        }else{
            $filtervals = [];
            foreach ($filter->fvalues as $fvalues){
                $filtervals[$fvalues->fv_id] = $fvalues->fv_value;
            }
            return response($filtervals);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filter = Filter::find($id);
        if(!$filter){
            return redirect('filters');
        }else{
            return view('filter.edit', compact('filter'));
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
        $filter = Filter::find($id);
        if(!$filter){
            return redirect('filters');
        }else{
            $input = $request->all();
            $filter->update($input);
            return redirect('filters');
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
        $filter = Filter::find($id);
        if(!$filter){
            return redirect('filters');
        }else{
            $filter->delete();
            return redirect('filters');
        }

    }

}
