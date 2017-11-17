<?php

namespace App\Http\Controllers;

use App\Filter;
use App\FilterValue;
use Illuminate\Http\Request;

use App\Http\Requests;

class filtervalueController extends Controller
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
        $fv = FilterValue::all();
        return view('fvalue.index', compact('fv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = Filter::lists('filter_name', 'filter_id');
        return view('fvalue.add', compact('filters'));
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
        $input->fv_created = date("Y-m-d h:i:s");
        FilterValue::create($input);
        return redirect('fvalues');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('fvalues');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fv = FilterValue::find($id);
        if(!$fv){
            return redirect('fvalues');
        }else{
            $filters = Filter::lists('filter_name', 'filter_id');
            return view('fvalue.edit', compact('fv', 'filters'));
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
        $fv = FilterValue::find($id);
        if(!$fv){
            return redirect('fvalues');
        }else{
            $input = $request->all();
            $fv->update($input);
            return redirect('fvalues');
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
        $fv = FilterValue::find($id);
        if(!$fv){
            return redirect('fvalues');
        }else{
            $fv->delete();
            return redirect('fvalues');
        }

    }


}
