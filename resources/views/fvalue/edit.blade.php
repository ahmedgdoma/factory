@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">edit FilterValue</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($fv, ['files'=>'true', 'method'=>'PATCH', 'action' => ['filtervalueController@update', 'id'=>$fv->fv_id]]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="InputFilterValueName">value</label>
                            {!! Form::text('fv_value', null, ['class' => 'form-control', 'id' => 'InputFilterValueName', 'placeholder' => 'Enter FilterValue name']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputFilterValueStat">filter</label>
                            {!! Form::select('fv_filterid', $filters, null, ['class' => 'form-control', 'id' => 'InputFilterValueStat']); !!}
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