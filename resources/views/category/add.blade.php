@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">add Category </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['action' => 'categoryController@store', 'files'=>'true ']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="InputCategoryName">category name</label>
                                {!! Form::text('cat_name', null, ['class' => 'form-control', 'id' => 'InputCategoryName', 'placeholder' => 'Enter category name']); !!}
                            </div>
                            <div class="form-group">
                                <label for="InputCategoryStat">status</label>
                                {!! Form::select('cat_status', ['' => 'select status', '0' => '0', '1' => '1'], null, ['class' => 'form-control', 'id' => 'InputCategoryStat']); !!}
                            </div>
                            <div class="form-group">
                                <label for="InputCategoryImage">image</label>
                                {!! Form::file('cat_image', ['id' => 'InputCategoryImage']); !!}

                                <p class="help-block"> block-level help text here.</p>
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