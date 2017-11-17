@extends('layouts.master')
@section('title')
    products
@endsection
@section('content')
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>
                products Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a class="active">products</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <a href="{{url('products/create')}}" class="btn btn-info">add product</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>name</th>
                                    <th>category</th>
                                    <th>filter</th>
                                    <th>price</th>
                                    <th>description</th>
                                    <th>code</th>
                                    <th>discount</th>
                                    <th>added by</th>
                                    <th>created at</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->p_name}}</td>
                                    <td>{{$product->cat->cat_name}}</td>
                                    <td>
                                        @foreach($product->filterv as $filtervalue)
                                            <strong>{{$filtervalue->filter['filter_name']}}:</strong>{{$filtervalue['fv_value']}}<br>
                                        @endforeach
                                    </td>
                                    <td>{{$product->p_price}}</td>
                                    <td>{{$product->p_description}}</td>
                                    <td>{{$product->p_code}}</td>
                                    <td>{{$product->p_discount}}</td>
                                    <td>{{$product->user['user_username']}}</td>
                                    <td>{{$product->p_created}}</td>
                                    <td class="form-holder">
                                        <a class="btn btn-primary" href="{{url('products/'. $product->p_id .'/edit') }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td class="form-holder">

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="{{'#modal-danger-'.$product->p_id}}">
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
        @foreach ($products as $product)
        <div class="modal modal-danger fade in" id="{{'modal-danger-'.$product->p_id}}" style=" padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">alert</h4>
                    </div>
                    <div class="modal-body">
                        <p>do you realy want to delete product <strong style="color: #000;">{{$product->p_name}}</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        {!! Form::open(['url' => 'products/'.$product->p_id, 'method' => 'delete']) !!}
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