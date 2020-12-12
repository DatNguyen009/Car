<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New pass</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="/Car/resources/css/index.css">
</head>

<body>
    @include('header')
    <div class="container">
        <h3 class="text-center">Đặt lại mật khẩu mới</h3>
        @if (session('errors'))
            <p class="text-center" style="color: red;"> {{ session('errors')->first('err_mailExit') }} </p>
        @else
            @if (Session::has('err_pass'))
            <p class="text-center" style="color: red;"> {{ session('err_pass') }} {{Session::forget('err_pass')}} </p>
            @endif
        @endif
        <form action="{{ route('UpdatePass.post') }}" method="post">
            {{ csrf_field() }}
            <div class="princess_component--inputregister" style="margin: 0 auto;">
                <div class="email">
                    <p>Nhập địa chỉ email</p>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Địa chỉ Email" @if (Session::has('email'))
                value="{{session('email')}}"
                    @endif >
                    @if ($errors->has('username'))
                        <span style="color: rgb(250, 63, 103)">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="password">
                    <p>Nhập mật khẩu mới</p>
                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" @if (Session::has('password'))
                    value="{{session('password')}} {{Session::forget('password')}}"
                        @endif>
                    @if ($errors->has('password'))
                        <span style="color: rgb(250, 63, 103)">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="confirm-password">
                    <p>Nhập xác nhận mật khẩu</p>
                    <input type="password" name="confirm_password" class="form-control"
                        placeholder="Xác nhận mật khẩu mới" @if (Session::has('confirm_password'))
                        value="{{session('confirm_password')}} {{Session::forget('confirm_password')}}"
                            @endif>
                    @if ($errors->has('confirm_password'))
                        <span style="color: rgb(250, 63, 103)">{{ $errors->first('confirm_password') }}</span>
                    @endif
                </div>
            </div>
            <div class="princess_component--buttonregister" style="margin: 0 27rem;">
                <button type="submit" class="btn btn-success login">Đặt lại mật khẩu</button>
            </div>
        </form>
    </div>
</body>

</html>
