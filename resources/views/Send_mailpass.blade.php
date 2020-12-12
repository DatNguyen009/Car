<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Pass</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Car/resources/css/index.css">
</head>

<body>
    @include('header')
    <div class="container">
        <div class="resetpass text-center" style="margin-top: 4rem;">
            <div class="resetpass_title">
                <h3>Quên mật khẩu</h3>
                <div class="notify" style="padding: 0 25rem;">
                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{ session('errors')->first('error_emptyEmail') }}</p>
                        </div>
                    @else
                        @if (session('err_Notemail'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{ session('err_Notemail') }} {{Session::forget('err_Notemail')}} </p>
                        </div>
                        @endif
                      
                    @endif

                  
                </div>
            </div>
            <div class="infor_reset ">
                <form action="{{ route('ResetPass.post') }} " method="post">
                    {{ csrf_field() }}
                    <input name="Email_resetpass" type="text" class="form-control"
                        placeholder="Nhập địa chỉ Email của bạn " style="margin:2rem auto; width: 20rem;">
                    <button type="submit" class="btn btn-success" style="margin-top: 1rem; text-align: center;">Lấy lại
                        mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
