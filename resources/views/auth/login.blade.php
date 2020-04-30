<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Logar</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}"" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>{{ config('app.name') }}</b></a>
        </div>
        <div class="card">
            <div class="body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="sign_in" method="POST" action="{{ route('login') }}"">
                    {{ csrf_field() }}
                    <div class="msg">Credenciais</div>
                    <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <label>Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <span id="see_password_span" class="input-group-addon" style="cursor: pointer;">
                            <i id="see_password" class="material-icons">visibility</i>
                        </span>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xs-6">
                                <button class="btn btn-block bg-green waves-effect" type="submit">Entrar</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{ route('register') }}" class="button btn btn-block bg-blue-grey waves-effect">Registrar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/examples/sign-in.js') }}"></script>
    <script>
        var see_password = false;
        $(() => {
            $("#see_password_span").click(() => {
                if (!see_password) {
                    $("#see_password").html("visibility_off");
                    $("#password").prop('type', 'text');
                } else {
                    $("#see_password").html("visibility");
                    $("#password").prop('type', 'password');
                }
                see_password = !see_password;
            });
        });
    </script>
</body>

</html>