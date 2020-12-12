<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Mail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="/Car/resources/css/index.css">

</head>

<body>
    <div class="header container">
        <div class="header__content ">
            <div class="row">
                <div class="col-4">
                    <div class="header__left">
                        <ul>
                            <li><a href="/Car/public/">HOME</a></li>
                            <li><a href="#inventory">INVENTORY</a></li>
                            <li><a href="/Car/public/service">SERVICES</a></li>
                            <li><a href="/Car/public/contact">CONTACT</a></li>
                            <li><a href="/Car/public/shop">SHOP</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="header__logo">
                        <img src="/Car/public/image/01_Home_01/logo-dark.png" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="header__right">
                        <div class="row">
                            <div class="col-12">
                                <form class="header__form" action=" {{ url('/Search') }} " method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search"
                                            aria-label="Recipient's username" name="search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="submit"> <span class="input-group-text" id="basic-addon2"><i
                                                        class="fa fa-search"></i></span></button>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="checkMail">
            <div class="checkMail__title " style="padding-top: 4rem;">
                <h3>Xác nhận đăng ký</h3>
                <p style="margin-top: 2rem;">Cảm ơn bạn đã đăng ký tài khoản trên trang của chúng tôi. Bạn cần kích hoạt tài khoản bằng cách xác nhận địa chỉ email.</p>
                <p>Chúng tôi đã gửi một email tới địa chỉ email bạn sử dụng để đăng ký tài khoản.</p>
                <p> Bạn vui lòng kiểm tra hộp mail và để lấy mã xác nhận và nhập mã xác nhận vào bên dưới</p>

                <form action="{{route('Checkmail.User')}} " method="post">
                    <input id="token" type="hidden" name="_token" value="{!!  csrf_token() !!}">
                    <input type="text" name="code_confirm" class="form-control " style="width: 28rem;"
                        placeholder="Mã xác nhận">
                    @if (Session::has('codeFail'))
                        <p class="text-danger">{{Session::get('codeFail')}}</p>
                    @endif
                    <button type="submit" class="btn btn-success" style="margin-top: 1rem;">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
