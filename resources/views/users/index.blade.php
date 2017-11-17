@extends('layouts.master')
@section('title')
    users
@endsection
@section('content')
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            users Table
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">users</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="{{url('users/create')}}" class="btn btn-info">add user</a>
                        <a href="{{url('users/'. Auth::user()->user_id)}}" class="btn btn-info">profile</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>username</th>
                                <th>full name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>code</th>
                                <th>group</th>
                                <th>status</th>
                                <th>added by</th>
                                <th>created at</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{$user->user_username}}
                                    </td>
                                    <td>
                                        {{$user->user_fullname}}
                                    </td>
                                    <td>{{$user->user_email}}</td>
                                    <td>{{$user->user_phone}}</td>
                                    <td>{{$user->user_code}}</td>
                                    <td>{{$user->group['ug_name']}}</td>
                                    <td>{{$user->user_status}}</td>
                                    <td>{{$user->userAdd['user_username']}}</td>
                                    <td>{{$user->user_created}}</td>
                                    <td class="form-holder">
                                        <a class="btn btn-primary" href="{{url('users/'. $user->user_id .'/edit') }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    @if(Auth::user()->user_id != $user->user_id)
                                        <td class="form-holder">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$user->user_id }}">
                                                X
                                            </button>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    @foreach ($users as $user)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$user->user_id }}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete category <strong style="color: #000;">{{$user->user_username}}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'fvalues/'. $user->user_id , 'method' => 'delete']) !!}
                        {!! Form::submit('X', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    <!-- /.content -->
@endsection('content')