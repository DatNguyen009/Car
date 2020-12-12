<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Car/resources/css/index.css">

</head>

<body>
    @include('header')
  
    <main>
        <div class="princess_login">
            <div class="princess_component">
                <h5 class="text-center">Đăng ký</h5>
                @if (session('errors'))
                    <p class="text-center text-danger"> {{ session('errors')->first('error_pass') }} </p>
                @endif
                <form action="{{route('PostRegister')}} " method="post" >
                    {{ csrf_field() }}
                 
                    <div class="princess_component--inputregister">
                        <div class="email">
                            <input id="user" type="text" name="username" class="form-control" placeholder="Email"    @if(Session::has('email'))
                        value="{{ session('email') }} {{Session::forget('email')}}" 
                        @endif >
                            @if ($errors->has('username'))
                                <span style="color: rgb(250, 63, 103)">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="nameuser">
                            <input id="customer" type="text" name="customer" class="form-control" placeholder="Tên khách hàng"  @if(Session::has('customer'))
                            value="{{ session('customer') }} {{Session::forget('customer')}}" 
                            @endif>
                            @if ($errors->has('customer'))
                                <span style="color: rgb(250, 63, 103)">{{ $errors->first('customer') }}</span>
                            @endif
                        </div>

                        <div class="address">
                            <input id="address" type="text" name="address" class="form-control" placeholder="Địa chỉ" @if(Session::has('address'))
                            value="{{ session('address') }} {{Session::forget('address')}}" 
                            @endif>
                            @if ($errors->has('address'))
                                <span style="color: rgb(250, 63, 103)">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        
                        <div class="SDT">
                            <input id="SDT" type="text" name="SDT" class="form-control" placeholder="Số điện thoại" @if(Session::has('SDT'))
                            value="{{ session('SDT') }} {{Session::forget('SDT')}}" 
                            @endif>
                            @if ($errors->has('SDT'))
                                <span style="color: rgb(250, 63, 103)">{{ $errors->first('SDT') }}</span>
                            @endif
                        </div>

                        <div class="password">
                            <input type="password" name="password" class="form-control" placeholder="Mật Khẩu">
                            @if ($errors->has('password'))
                                <span style="color: rgb(250, 63, 103)">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="confirm-password">
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Xác nhận mật khẩu">
                            @if ($errors->has('confirm_password'))
                                <span style="color: rgb(250, 63, 103)">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="princess_component--buttonregister">
                        <button type="submit" class="btn btn-success login">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    {{-- <script>
       
        function check() {
            var email = document.querySelector("#user").value;
            console.log(email);

            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        }

    </script> --}}
</body>

</html>
