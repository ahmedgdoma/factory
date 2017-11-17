<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
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
        if(Auth::user()->user_groupid == 1){
            $users = User::all();
            return view('users.index', compact('users'));
        }else{
            return $this->show(Auth::user()->user_id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = Group::lists('ug_name', 'ug_id');
        return view('users.add', compact('group'));
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
        if(isset($input['user_photo']) && $input['user_photo'] != ""){
            $input['user_photo'] =$this->upload($input);
        }else{
            $input['user_photo'] = 'avatar.png';
        }
        $input->user_addedby = Auth::user()->user_id;
        $input->user_created = date("Y-m-d h:i:s");
        User::create($input);
        return redirect('/users');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect('users');
        }else{
            $group = Group::lists('ug_name', 'ug_id');
            return view('users.show', compact('user'));
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
        $user = User::find($id);
        if(!$user){
            return redirect('users');
        }else{
            $group = Group::lists('ug_name', 'ug_id');
            return view('users.edit', compact('update', 'group'));
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
        $user = User::find($id);
        if(!$user){
            return redirect('users');
        }else{
            $input = $request->all();
            if(isset($input['user_photo']) && $input['user_photo'] != ""){
                $input['user_photo'] =$this->upload($input);
            }else{
                $input['user_photo'] = $user->user_photo;
            }
            $user->update($input);
            return redirect('/users');
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
        $user = User::find($id);
        if(!$user){
            return redirect('users');
        }else{
            $user->delete();
            return redirect('users');
        }

    }

    public function upload($input_arr){
        $file = $input_arr['user_photo'];
        $exten = $file->getClientOriginalExtension();
        $fileName = date('y-m-d_'). $input_arr['user_username'] . '.' . $exten;
        $path = public_path('images/');
        $file->move($path, $fileName);
        return $fileName;
    }

}
