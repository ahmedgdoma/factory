@extends('layouts.master')
@section('title')
    add filter
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">add filter</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['action' => 'filterController@store', 'files'=>'true']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="InputFilterName">value</label>
                            {!! Form::text('filter_name', null, ['class' => 'form-control', 'id' => 'InputFilterName', 'placeholder' => 'Enter Filter name']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputFilterOrder">order</label>
                            {!! Form::text('filter_orderby', null, ['class' => 'form-control', 'id' => 'InputFilterOrder', 'placeholder' => 'Enter Filter order']); !!}
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection('content')