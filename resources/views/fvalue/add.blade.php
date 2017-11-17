@extends('layouts.master')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">add FilterValue</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['action' => 'filtervalueController@store', 'files'=>'true ']) !!}
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection('content')