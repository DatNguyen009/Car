<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="/Car/resources/css/index.css">

</head>

<body>
    @include('header')
    <main>
        <div class="princess_login">
            <div class="princess_component">
                <h5 class="text-center">Đăng nhập</h5>
                @if (session('errors'))
                    <p class="text-center text-danger"> {{ session('errors')->first('error_login') }} </p>
                @else
                    @if (Session::has('register_client'))
                        <p class="text-center" style="color: rgb(19, 165, 19);"> {{ session('register_client') }} {{Session::forget('register_client')}}</p>
                    @else
                        @if (Session::has('notify_resetPass'))
                        <p class="text-center" style="color: rgb(19, 165, 19);"> {{ session('notify_resetPass') }} {{Session::forget('notify_resetPass')}}</p>
                        @else   
                        @if (Session::has('resetPass_success'))
                            <p class="text-center" style="color: rgb(19, 165, 19);"> {{ session('resetPass_success') }} {{Session::forget('resetPass_success')}}</p>
                            @endif
                        @endif
                    @endif
                @endif
                <div class="princess_component--social">
                    <div class="facebook">
                        <a href="javascript:void(0)" onclick="fbLogin()"><i
                                class="fab fa-facebook-square"></i>Facebook</a>
                    </div>
                    <div class="google">
                        <a href="#"> <svg aria-hidden="true" class="svg-icon native iconGoogle" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18z"
                                    fill="#4285F4"></path>
                                <path
                                    d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17z"
                                    fill="#34A853"></path>
                                <path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07z"
                                    fill="#FBBC05"></path>
                                <path
                                    d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3z"
                                    fill="#EA4335"></path>
                            </svg>Google</a>
                    </div>
                </div>

                <p class="text-center" id="error_login"></p>

                <form action="{{ route('PostLogin') }}" method="post">
                    <input id="token" type="hidden" name="_token" value="{!!  csrf_token() !!}">
                    <div class="princess_component--input">
                        <div class="email">
                            <input id="form_email" type="text" name="username" class="form-control"
                            value="@if (Session::has('username')) {{session('username')}} {{Session::forget('username')}} @endif"  placeholder="Email" >
                            @if ($errors->has('username'))
                                <p style="color: red;">{{ $errors->first('username') }}</p>
                            @endif
                        </div>
                        <div class="password_login">
                            <input id="form_pass" type="password" name="password" class="form-control"
                                placeholder="Mật Khẩu">

                            @if ($errors->has('password'))
                                <p style="color: red;">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="princess_component--resetpass">
                        <a href="/Car/public/Resetpass">Quên mật khẩu?</a>
                    </div>
                    <div class="princess_component--button">
                        <button id="login" type="submit" class="btn btn-success login" name="submit">Đăng
                            nhập</button>
                    </div>
                </form>

                <div class="princess_component--register">
                    <p>Bạn chưa có tài khoản?</p>
                    <a href="/Car/public/Register">Đăng ký</a>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    

        <script>
            var input = document.getElementById("form_pass");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    document.getElementById("login").click();
                }
            });

        </script>
</body>

</html>
