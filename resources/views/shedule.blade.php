<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="../../node_modules/pickerjs/dist/picker.css" rel="stylesheet">
    <script src="/Car/node_modules/pickerjs/dist/picker.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.13.16/jquery.timepicker.css">
    <script src="https://cdn.jsdelivr.net/npm/timepicker@1.13.16/jquery.timepicker.js"></script>
    <script>
        $(function() {
            $("#date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });

    </script>

</head>

<body>

    @include('header')
    <div class="service__banner">
        <div class="banner__content">
            <h1>Service Schedule</h1>
            <p><a href="./index.html" title="Về trang chủ">Home</a> &nbsp; || &nbsp; Service Schedule</p>
        </div>
    </div>
    <div class="schedule">
        <div class="schedule__content container">
            <div class="schedule__title">
                <h1>Make An <span>Appointment</span></h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur aperiam iusto quibusdam earum
                    sunt voluptatem ratione est numquam vel corporis.</p>
            </div>
            <div class="contact__form">
                <div class="row">
                    <!-- <div class="col-4">
                        <h1>Message <span>Us</span></h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit expedita consequuntur exercitationem mollitia molestiae nobis? Culpa totam quidem sint cumque, eaque distinctio quasi porro nobis aperiam vitae consectetur, neque alias?</p>
                    </div> -->
                    <div class="col-12">
                        <div class="contact__form">
                            <h6 id="error_general">

                            </h6>

                            <div class="form">

                                <input type="text" placeholder="Tên khách hàng" name="name" id="name"
                                    value="{{ Auth::user()->customer }} " disabled>

                                <input type="number" placeholder="Số điện thoại" name="phoneNumber" id="phoneMumber"
                                    value="{{ Auth::user()->SDT }}" disabled>

                                <textarea name="email" id="email" placeholder="Email"
                                    disabled>{{ Auth::user()->username }} </textarea>

                                <textarea placeholder="Địa chỉ" name="address" id="address"
                                    disabled>{{ Auth::user()->address }} </textarea>
                                <input type="text" placeholder="Ngày lái thử" name="date" id="date">

                                <input type="text" placeholder="09:00:00" name="hour" id="hour">
                                <textarea placeholder="Message" name="message" id="message"></textarea>
                                <script>
                                    $('#hour').timepicker({
                                        'disableTimeRanges': [
                                            ['0', '7'],
                                            ['19', '23:59'],
                                        ],
                                        'timeFormat': 'H:i',
                                    });

                                </script>
                                <button id="btn_submitSchedule" type="submit" onclick="Schedule({{ $id }})">MAKE
                                    APPOINTMENT</button>
                            </div>

                        </div>
                    </div>
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
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Thư viện bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/Car/resources/js/index.js"></script>

    <script>
        function Schedule(id) {

            var error_general = document.querySelector("#error_general");

            var name = document.querySelector("#name").value;
            var email = document.querySelector("#email").value;
            var PhoneNumber = document.querySelector("#phoneMumber").value;
            var date = document.querySelector("#date").value;
            var address = document.querySelector("#address").value;
            var message = document.querySelector("#message").value;
            var hour = document.querySelector("#hour").value;

            if (name == "") {
                error_general.innerHTML = "Vui lòng tên không được để trống!!";
                return false;
            } else {

                if (email == "") {
                    error_general.innerHTML = "Vui lòng email không được để trống!!";
                    return false;

                } else {
                    if (PhoneNumber == "") {
                        error_general.innerHTML = "Vui lòng SDT không được để trống!!";
                        return false;
                    } else {
                        if (date == "") {
                            error_general.innerHTML = "Vui lòng ngày đặt lịch không được để trống!!";
                            return false;
                        } else {
                            if (address == "") {
                                error_general.innerHTML = "Vui lòng địa chỉ không được để trống!!";
                                return false;
                            } else {
                                if (hour == "") {
                                    error_general.innerHTML = "Vui lòng giờ không được để trống!!";
                                    return false;
                                } else {
                                    error_general.innerHTML = "";
                                }
                            }
                        }
                    }
                }
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('PostSchedule') }}",
                method: "POST",
                data: {
                    id: id,
                    name: name,
                    email: email,
                    PhoneNumber: PhoneNumber,
                    date: date,
                    hour: hour,
                    address: address,
                    message: message,
                },
                success: function(response) {
                    console.log(response);
                    // if (response == "error") {
                    //     alertify
                    //         .alert("Thông báo",
                    //             "Ngày giờ của bạn không phù hợp",
                    //             function() {
                    //                 alertify.message('OK');
                    //             });

                    // } else {
                    //     if (response == 'success') {
                    //         location.href = "/Car/public/Thank";
                    //     } else {
                    //         alertify
                    //             .alert("Thông báo",
                    //                 "Giờ đặt lịch bị trùng.<br>Bạn có thể đặt lịch vào các giờ khác như:" + `<br> ${response}`,
                    //                 function() {
                    //                     alertify.message('OK');
                    //                 });

                    //     }
                    // }
                }
            })
        }

    </script>


</body>

</html>
