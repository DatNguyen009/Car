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
            <h1>Contact Us</h1>
            <p><a href="./index.html" title="Về trang chủ">Home</a> &nbsp; || &nbsp; Contact Us</p>
        </div>
    </div>
    <div class="contact">
        <div class="contact__content container">
            <div class="contact__add">
                <div class="row">
                    <div class="col-4">
                        <div class="contact__item">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="col-9">
                                    <h4>Location</h4>
                                    <p> 18T ,Tô Ký ,Quận 12, TP. Hồ Chí Minh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="contact__item1">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="col-9">
                                    <h4>Email</h4>
                                    <p>Supportcar@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="contact__item2">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa fa-phone-volume"></i>
                                </div>
                                <div class="col-9">
                                    <h4>Phone Us</h4>
                                    <p> 0352073743 - 0333 264 762</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="contact__form">
                <div class="row">
                    <div class="col-4">
                        <h1>Message <span>Us</span></h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit expedita consequuntur exercitationem mollitia molestiae nobis? Culpa totam quidem sint cumque, eaque distinctio quasi porro nobis aperiam vitae consectetur, neque alias?</p>
                    </div>
                    <div class="col-8">
                        <!-- <div class="row">
                            <div class="col-6">
                                <input type="text" placeholder="Full name here">
                            </div>
                            <div class="col-6">
                                <input type="email" placeholder="Email Here">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" placeholder="Your Phone">
                            </div>
                            <div class="col-6">
                                <input type="text" placeholder="Your Address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="text">
                            </div>
                        </div> -->
                        <div class="contact__form">
                            <div class="form">
                                <input type="text" placeholder="Name" name="" id="">
                                <input type="email" placeholder="Email" name="" id="">
                                <input type="text" placeholder=" Your Phone" name="" id="">
                                <input type="text" placeholder="Your Address" name="" id="">
                                <textarea placeholder="Message" name="" id="message" ></textarea>
                                <button type="submit">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="contact__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3918.906482404985!2d106.6566358!3d10.8184684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529111aa89f9d%3A0xd8f09cc0aa1b27f3!2zQ-G6o25nIGjDoG5nIGtow7RuZyBRdeG7kWMgdOG6vyBUw6JuIFPGoW4gTmjhuqV0!5e0!3m2!1svi!2s!4v1596877501880!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
</body>

</html>