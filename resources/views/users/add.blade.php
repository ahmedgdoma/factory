@extends('layouts.master')
@section('title')
    add user
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">edit profile</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open( ['files'=>'true', 'action' => ['userController@store']]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="InputUserName">full name</label>
                            {!! Form::text('user_fullname', null, ['class' => 'form-control', 'id' => 'InputUserName']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputUserUsername">username</label>
                            {!! Form::text('user_username', null, ['class' => 'form-control', 'id' => 'InputUserUsername']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputUserEmail">email</label>
                            {!! Form::email('user_email', null, ['class' => 'form-control', 'id' => 'InputUserEmail']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputUserPhone">phone</label>
                            {!! Form::number('user_phone', null, ['class' => 'form-control', 'id' => 'InputUserPhone']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputUserGender">gender</label>
                            {!! Form::select('user_gender',[0=>'female', 1=>'male'],  null, ['class' => 'form-control', 'id' => 'InputUserPhone']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputUserGroup">group</label>
                            {!! Form::select('user_gender',$group,  null, ['class' => 'form-control', 'id' => 'InputUserGroup']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputUserPhoto">profile picture</label>
                            {!! Form::file('user_photo', null, ['class' => 'form-control', 'id' => 'InputUserPhoto']); !!}
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