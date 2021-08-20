
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('public/backend/css/toastr.min.css') }}">
    <title>Login</title>
    <style>
        body {
        background: #222D32;
        font-family: 'Roboto', sans-serif;
        }
    
        .login-box {
            margin-top: 75px;
            height: auto;
            background: #1A2226;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
    
        .login-key {
            height: 100px;
            font-size: 80px;
            line-height: 100px;
            background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    
        .login-title {
            margin-top: 15px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 2px;
            margin-top: 15px;
            font-weight: bold;
            color: #ECF0F5;
        }
    
        .login-form {
            margin-top: 25px;
            text-align: left;
        }
    
        input[type=email] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            margin-bottom: 20px;
            padding-left: 10px;
            color: #ECF0F5;
        }
    
        input[type=password] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            border-top: 0px;
            border-radius: 0px;
            font-weight: bold;
            outline: 0;
            padding-left: 10px;
            margin-bottom: 20px;
            color: #ECF0F5;
        }
    
        .form-group {
            margin-bottom: 40px;
            outline: 0px;
        }
    
        .form-control:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-bottom: 2px solid #0DB8DE;
            outline: 0;
            background-color: #1A2226;
            color: #ECF0F5;
        }
    
        input:focus {
            outline: none;
            box-shadow: 0 0 0;
        }
    
        label {
            margin-bottom: 0px;
        }
    
        .form-control-label {
            font-size: 10px;
            color: #6C6C6C;
            font-weight: bold;
            letter-spacing: 1px;
        }
    
        .btn-outline-primary {
            border-color: #0DB8DE;
            color: #0DB8DE;
            border-radius: 0px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            padding:10px 40px 10px 40px
        }
    
        .btn-outline-primary:hover {
            background-color: #0DB8DE;
            right: 0px;
        }
    
        .login-btm {
            float: left;
        }
    
        .login-button {
            padding-right: 0px;
            text-align: right;
            margin-bottom: 25px;
        }
    
        .login-text {
            text-align: left;
            padding-left: 0px;
            color: #A2A4A4;
        }
    
        .loginbttm {
            padding: 0px;
        }
        .text-red{
            color: #ad0d0d;
            font-size: 14px;
            padding: 0;
        }
        @media  screen and (max-width:992px){
            .login-box {
                max-height: 100%;
                padding-bottom: 100px;
            }
            .btn-outline-primary {
                padding:15px 40px 15px 40px
            }
        }
    </style>
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                ĐĂNG NHẬP
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="post" action="{{ route('login.dashboard.admin') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">EMAIL</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="text-red">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @if($errors->has('password'))
                                <div class="text-red">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-text">
                                <!-- Error Message -->
                            </div>
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
</div>
<script src="{{ asset('public/backend/js/toastr.min.js') }}"></script>
<script>
@if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
@endif
@if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
@endif
</script>
</body>
</html>