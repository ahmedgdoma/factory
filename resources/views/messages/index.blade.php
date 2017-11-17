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
                        <a href="{{url('messages/create')}}" class="btn btn-info">send new message</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>message</th>
                                <th>created at</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>
                                        {{$message->message}}
                                    </td>
                                    <td>{{$message->created_at}}</td>
                                        <td class="form-holder">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$message->id }}">
                                                X
                                            </button>
                                        </td>
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

    @foreach ($messages as $message)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$message->id }}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete message</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'messages/'. $message->id , 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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