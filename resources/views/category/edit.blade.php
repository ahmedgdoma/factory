@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quick Example</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($category, ['files'=>'true', 'method'=>'PATCH', 'action' => ['categoryController@update', 'id'=>$category->cat_id]]) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputCategoryName">user</label>
                                {!! Form::text('cat_name', null, ['class' => 'form-control', 'id' => 'exampleInputCategoryName', 'placeholder' => 'Enter username']); !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCategoryStat">status</label>
                                {!! Form::select('cat_status', ['' => 'select status', '0' => '0', '1' => '1'], null, ['class' => 'form-control', 'id' => 'exampleInputCategoryStat']); !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCategoryImage">image</label>
                                {!! Form::file('cat_image', ['id' => 'exampleInputCategoryImage']); !!}
                                <p class="help-block">
                                    @if($category->cat_image != '' || $category->cat_image != NULL)
                                        <img src="{{url('public/images/categories'. $category->cat_image)}}">
                                    @else
                                        <img src="" alt="no image">
                                    @endif
                                </p>
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