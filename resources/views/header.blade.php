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
                                        aria-label="Recipient's username" name="search" aria-describedby="basic-addon2">
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
            <div class="col-2">

                @if (Session::has('login_client'))
                    <div class="login_register" style="margin-top: 6px; display: flex;">
                        <div class="dropdown" style="padding-right: 10px;">
                            <button class="btn btn-secondary " type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: flex;">
                               <p class="text-truncate" style="width: 40px; margin-bottom: 0;"> {{ Auth::user()->username }}</p> <i class="fa fa-sort-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/Car/public/InforPersonal">Thông tin cá nhân</a>
                                <a class="dropdown-item" href="/Car/public/UserSchedule">Xem lịch lái thử</a>
                            </div>
                        </div>
                        <a href="/Car/public/Logout"
                            style="color: black; text-decoration: none; font-size: 16px; font-weight: bold;">Logout</a>
                    </div>
                @else
                    <div class="login_register" style="margin-top: 6px;">
                        <a href="/Car/public/Login"
                            style="color: black; text-decoration: none; font-size: 16px; font-weight: bold; margin-right: 20px;">Login</a>
                        <a href="/Car/public/Register"
                            style="color: black; text-decoration: none; font-size: 16px; font-weight: bold;">Register</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
