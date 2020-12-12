<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực tập tốt nghiệp</title>
    <!-- FONT GOOGLE  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- BOOTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- MAIN CSS  -->
    <link rel="stylesheet" href="/Car/resources/css/index.css">
</head>

<body>
    @include('header')

    <div class="service__banner">
        <div class="banner__content">
            <h1>Shop View</h1>
            <p><a href="./index.html" title="Về trang chủ">Home</a> &nbsp; || &nbsp; Shop View</p>
        </div>
    </div>





    <div class="latest__Car" id="inventory">
        <div class="latest__content container">

            <div class="row intro__card">
                <div class="col-6">
                    <h1>New <span>Cars</span></h1>
                </div>
                <div class="col-6 right__intro">
                    <!-- Example single danger button -->
                    <div class="dropdown" id="down">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lọc
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <form action="{{ route('filtermintomax') }} " method="get">
                                <button>Lọc theo giá từ thấp đến cao</button>
                            </form>
                            <form action="{{ route('filtermaxtomin') }} " method="get">
                                <button>Lọc theo giá từ cao đến thấp</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <div class="latest__card">

                <div class="row ">
                    @foreach ($filterPiece as $product)
                        <div class="col-4 card__item">
                            <div class="card">
                                <a href="/Car/public/detail/{{ $product->prod_name }}"><img
                                        src="/Car/public/image/{{ $product->prod_img }}" class="card-img-top"
                                        alt="{{ $product->prod_name }}"></a>
                                <div class="card-body">
                                    <a href="/Car/public/detail/{{ $product->prod_name }}">
                                        <h5 class="card-title">{{ $product->prod_name }}</h5>
                                    </a>
                                    <p class="card-text text-truncate"> {{ $product->prod_description }} </p>
                                    <div class="card__icon">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fa fa-cogs"></i>
                                                <span>Động cơ: {{ $product->prod_Engine }} </span>
                                            </div>
                                            <div class="col-6">
                                                <i class="fa fa-car-side"></i>
                                                <span>Tốc độ tối đa: {{ $product->prod_MaxSpeed }} </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fa fa-gas-pump"></i>
                                                <span>Tiết kiệm nhiên liệu: {{ $product->prod_Combine }} </span>
                                            </div>
                                            <div class="col-6">
                                                <i class="fa fa-dollar-sign"></i>
                                                <span>{{ number_format($product->prod_cost) }}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">

                    @if ($filterPiece->currentPage() > 1 && $filterPiece->lastPage() > 1)
                        <a class="btn btn-light" href="{{ $filterPiece->previousPageUrl() }}">Prev</a>
                    @endif


                    @for ($i = 1; $i <= $filterPiece->lastPage(); $i++)
                        <!-- a Tag for another page -->
                        @if ($i == $filterPiece->currentPage())
                            <a href="{{ $filterPiece->url($i) }}" class="text-center active">
                                <p style="color: #ea2d4e;">{{ $i }}</p>
                            </a>
                        @else
                            <a href="{{ $filterPiece->url($i) }}" class="text-center">
                                <p>{{ $i }}</p>
                            </a>
                        @endif

                    @endfor

                    @if ($filterPiece->currentPage() < $filterPiece->lastPage())
                        <a class="btn btn-light" href="{{ $filterPiece->nextPageUrl() }}">Next</a>
                    @endif



                </div>
            </div>
        </div>
    </div>
    <div class="logo__brand container">
        <div class="logo__content">
            <div class="row">
                <div class="col-2"><img src="/Car/public/image/01_Home_01/client-logo1.png" alt=""></div>
                <div class="col-2"><img src="/Car/public/image/01_Home_01/client-logo2.png" alt=""></div>
                <div class="col-2"><img src="/Car/public/image/01_Home_01/client-logo3.png" alt=""></div>
                <div class="col-2"><img src="/Car/public/image/01_Home_01/client-logo4.png" alt=""></div>
                <div class="col-2"><img src="/Car/public/image/01_Home_01/client-logo5.png" alt=""></div>
                <div class="col-2"><img src="/Car/public/image/01_Home_01/client-logo6.png" alt=""></div>
            </div>
        </div>
    </div>





    <div class="my__footer ">
        <div class="footer__content container">
            <div class="row topic">
                <div class="col-lg-3 topic__item">
                    <h2>About Us</h2>
                    <p>On the other hand we denounce with righteous indidnation and dislike men who are so beguiled and
                        demoralized by the char ms of pleasure of the moment.</p>
                    <div class="icon__item">
                        <ul>
                            <li><a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a></li>
                            <li><a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a></li>
                            <li><a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a></li>
                            <li><a href="#">
                                    <i class="fab fa-google"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 topic__item">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="#">About Company</a></li>
                        <li><a href="#">Quick Services</a></li>
                        <li><a href="#">Meet ur Team</a></li>
                        <li><a href="#">New Arrival Cars</a></li>
                        <li><a href="#">Latest Blog & News</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 topic__item">
                    <h2>Our services</h2>
                    <ul>
                        <li><a href="#">Car Rentan Services</a></li>
                        <li><a href="#">Car Servicing</a></li>
                        <li><a href="#">Car Exchange</a></li>
                        <li><a href="#">New Cars & Used Cars</a></li>
                        <li><a href="#">Premium Services</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 topic__item" id="topic__item">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>Ho Chi Minh</span>
                        </li>
                        <li>
                            <i class="fa fa-phone-volume"></i>
                            <span>0352073743</span>
                        </li>
                        <li>
                            <i class="fa fa-mail-bulk"></i>
                            <span>van@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="end__footer">
                <hr>
                <div class="row">
                    <div class="col-6 end__left">
                        Copyright 2019 <span>Speedy</span> All Rights Reserved
                    </div>
                    <div class="col-6 end__right">

                        <ul>
                            <li><a href="#">Setting & privacy</a></li>
                            <li><a href="#">Need a job ?</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">New</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="backToTop">
            <a href="#">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </div>
    <!-- Thư viện hỗ trợ -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Thư viện bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <script src="/Car/resources/js/index.js"></script>
</body>

</html>
