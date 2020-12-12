

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
    @include('header');
    <section class="carousel__home">
        <div id="carouselControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/Car/public/image/img/carousel-1.jpeg" class="d-block w-100 img-fluid" alt="carousel-1">
                    <div class="carousel-caption d-block">
                        <h5 style="color: #333;"> Digital World Premiere of the new S-Class. </h5>

                        <button class="visitButton">Visit shop >></button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/Car/public/image/img/carousel-5.jpeg" class="d-block w-100 img-fluid" alt="carousel-5">
                    <div class="carousel-caption d-block">
                        <h5> Extensive update for Mercedes-AMG E 63 4MATIC+ Saloon and Estate. </h5>
                        <button class="visitButton">Visit shop >></button>
                    </div>

                </div>
                <div class="carousel-item">
                    <img src="/Car/public/image/img/carousel-6.jpeg" class="d-block w-100 img-fluid" alt="carousel-6">
                    <div class="carousel-caption d-block">
                        <h5> The new E-Class Coupé and Cabriolet. </h5>
                        <button class="visitButton">Visit shop >></button>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="/Car/public/image/img/carousel-4.jpeg" class="d-block w-100 img-fluid" alt="carousel-4">
                    <div class="carousel-caption d-block">
                        <h5> The new Mercedes-AMG GT Black Series. </h5>
                        <button class="visitButton">Visit shop >></button>
                    </div>

                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <div class="intro__Car">
        <div class="intro__content container">
            <div class="row">
                <div class="col-6">
                    <h3>Sự lựa chọn của riêng bạn</h3>
                    <h1>Welcome <span>Speedy</span></h1>
                    <p>Với Speedy, chúng tôi đã tạo ra một thương hiệu ô tô mà người Việt Nam có thể tự hào. Speedy đáp ứng được những yêu cầu của người lái xe trong nước, cũng như giải quyết nhu cầu của thị trường nội địa đang gia tăng, tại một trong số những nền kinh tế tăng trưởng nhanh nhất Đông Nam Á. Nhưng Speedy cũng là một hãng xe tân tiến trên thị trường thế giới, một công ty sẵn sàng chọn hướng tiếp cận chưa từng có để tạo ra những điều tuyệt vời. Bằng cách mang tới thị trường những mẫu xe đẳng cấp thế giới, Speedy sẽ trở thành một đối thủ mới có khả năng làm rung chuyển ngành công nghiệp ô tô toàn cầu.</p>
                </div>
                <div class="col-6">
                    <img src="/Car/public/image/img/video-24.jpeg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="latest__Car" id="inventory">
        <div class="latest__content container">
          
            <div class="row intro__card">
                <div class="col-6">
                    <h1>Sản phẩm <span>nổi bật </span></h1>
                </div>
                <div class="col-6 right__intro">
                    <a href="/Car/public/shop"><button type="button" class="btn btn-primary"> Visit shop >></button></a>  
                </div>
            </div>



            <div class="latest__card">
                <div class="row ">
                    @foreach ($products as $product)      
                    <div class="col-4 card__item">
                                    
                        <div class="card">
                        <a href="/Car/public/detail/{{$product->prod_name}}"><img src="/Car/public/image/{{$product->prod_img}}" class="card-img-top" alt="..."></a> 
                            <div class="card-body">
                                <a href="/Car/public/detail/{{$product->prod_name}}">
                                    <h5 class="card-title">{{$product->prod_name}}</h5>
                                </a>
                                <p class="card-text text-truncate"> {{$product->prod_description}} </p>
                                <div class="card__icon">
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-cogs"></i>
                                            <span>3500mm</span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-car-side"></i>
                                            <span>Model 2019</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-gas-pump"></i>
                                            <span>Mileage 45/46</span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-dollar-sign"></i>
                                            <span>{{number_format($product->prod_cost)}}đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="latest__button">
                <a href="/Car/public/shop"> <button class="btn btn-primary" type="button" onclick="Hidden()">View more >></button></a>
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
    <div class="why__choose container">
        <div class="why__content">
            <div class="why__intro">
                <h1>Tại sao Speedy là sự lựa chọn <span>của bạn</span></h1>
            </div>
            <div class="why__item">
                <div class="row">
                    <div class="col-3">
                        <img src="/Car/public/image/02_Home_02/icon-box-icon1.png" alt="">
                        <h3>Thông số kỹ thuật vượt trội</h3>
                        <p> Do hợp tác với những ông lớn trong ngành công nghiệp ô tô, Speedy đã có lợi thế dẫn đầu trong phân khúc thị trường tầm trung và cao cấp.

                        </p>
                    </div>
                    <div class="col-3">
                        <img src="/Car/public/image/02_Home_02/icon-box-icon2.png" alt="">
                        <h3>Hiệu suất tối ưu </h3>
                        <p>Speedy cho phép khách hàng thiết lập các thuộc tính cho xe bao gồm cảnh báo dây an toàn, giới hạn tốc độ tối đa và cảnh báo sắp cạn nhiện liệu</p>
                    </div>
                    <div class="col-3">
                        <img src="/Car/public/image/02_Home_02/icon-box-icon3.png" alt="">
                        <h3>Tiết kiệm nhiên liệu</h3>
                        <p>Với công nghệ hiện đại Speedy giúp bạn tiết kiệm tối đa nhiên liệu</p>
                    </div>
                    <div class="col-3">
                        <img src="/Car/public/image/02_Home_02/icon-box-icon4.png" alt="">
                        <h3>Thiết kế đột phá</h3>
                        <p> Những mẫu xe từ Speedy không chỉ đáp ứng mong muốn của người tiêu dùng về mặt ngoại hình mà còn đáp ứng được các yêu cầu về khả năng vận hành của họ.</p>
                    </div>

                </div>
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
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <!-- backToTop -->
    <!-- <script src="./js/util.js"></script> -->
    <!-- <script src="./js/skrollr.js"></script> -->
    <!-- <script type="text/javascript">
        var s = skrollr.init();
    </script> -->
    <script src="/Car/resources/js/index.js"></script>
    <script>
        var msg = '{{Session::get('sucess_mail')}}';
        var check_mail = '{{Session::has('sucess_mail')}}';
        if (check_mail) {
            alert(msg);
        }
    </script>
</body>

</html>