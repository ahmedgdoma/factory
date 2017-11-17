@extends('layouts.app')



@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/login') }}"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                @if ($errors->has('user_email') || $errors->has('user_password'))
                    <p class="">
                        <strong>{{ $errors->first('user_email') }}</strong>
                    </p>
                @endif
                <div class="form-group{{ $errors->has('user_email') ? ' has-error' : '' }} has-feedback">
                    <input type="email" class="form-control"  name="user_email" placeholder="Email" value="{{ old('user_email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback">
                        </span>


                </div>
                <div class="form-group{{ $errors->has('user_password') ? ' has-error' : '' }} has-feedback">
                    <input type="password" class="form-control" name="user_password" placeholder="Password"><br>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection