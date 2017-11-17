@extends('layouts.master')
@section('title')
    filters
@endsection
@section('content')
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Filters Table
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a class="active">filters</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="{{url('filters/create')}}" class="btn btn-info">add Filter</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>name</th>
                                <th>order by</th>
                                <th>added by</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($filters as $filter)
                                <tr>
                                    <td>{{$filter->filter_name}}</td>
                                    <td>{{$filter->filter_orderby}}</td>
                                    <td>{{$filter->user['user_username']}}</td>

                                    <td class="form-holder">
                                        <a class="btn btn-primary" href="{{url('filters/'. $filter->filter_id .'/edit') }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td class="form-holder">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$filter->filter_id}}">
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

    @foreach ($filters as $filter)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$filter->filter_id}}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete category <strong style="color: #000;">{{$filter->filter_name}}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'filters/'.$filter->filter_id, 'method' => 'delete']) !!}
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