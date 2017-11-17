@extends('layouts.master')
@section('title')
    profile
@endsection
@section('content')

    <section class="content-header">
        <h1>
            {{$user->user_fullname}} Profile
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">profile</li>
        </ol>
    </section>
    <Section class="content">
        <div class="row">
            <div class='col-md-6 col-md-offset-3'>
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{url('resources\assets\uplaods'). Auth::user()->user_photo}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->user_fullname}}</h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>email</b> <a class="pull-right">{{$user->user_email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>code</b> <a class="pull-right">{{$user->user_code}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>phone</b> <a class="pull-right">{{$user->user_phone}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>added by</b> <a class="pull-right">{{$user->userAdd->user_username}}</a>
                            </li>
                        </ul>

                        <a href="{{url('users/'. $user->user_id . '/edit')}}" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </Section>






@endsection