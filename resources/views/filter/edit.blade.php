@extends('layouts.master')
@section('title')
   edit filter
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">edit filter</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($filter, ['files'=>'true', 'method'=>'PATCH', 'action' => ['filterController@update', 'id'=>$filter->filter_id]]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="InputFilterValueName">value</label>
                            {!! Form::text('filter_name', null, ['class' => 'form-control', 'id' => 'InputFilterName', 'placeholder' => 'Enter Filter name']); !!}                        </div>
                        <div class="form-group">
                            <label for="InputFilterValueStat">filter</label>
                            {!! Form::text('filter_orderby', null, ['class' => 'form-control', 'id' => 'InputFilterOrder', 'placeholder' => 'Enter Filter order']); !!}
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection('content')