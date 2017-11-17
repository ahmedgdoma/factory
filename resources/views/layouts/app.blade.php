<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="{{url('resources/assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/assets/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/assets/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/assets/plugins/iCheck/square/blue.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body  class="hold-transition login-page" style="max-height: 100%;">
    @yield('content')

    <!-- JavaScripts -->
    <script src="{{url('resources/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('resources/assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{url('resources/assets/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
</html>
