@extends('layouts.master')
@section('title')
    send message
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">send message</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['files'=>'true', 'method'=>'POST', 'action' => ['messageController@store']]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="InputUserName">message</label>
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'id' => 'InputUserName']); !!}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('submit', ['class' => 'btn btn-primary']); !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
    </section>
@endsection('content')