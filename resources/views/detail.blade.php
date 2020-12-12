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
            <h1>Vehicles details</h1>
            <p><a href="./index.html" title="Về trang chủ">Home</a> &nbsp; || &nbsp; Vehicles details</p>
        </div>
    </div>
    <div class="car__details container">
        <div class="detail__content">
            <div class="row" style="display: flex;justify-content: center;">
                @foreach ($products as $product)
                    <div class="col-8">
                        <h5> {{ $product->prod_name }} </h5>
                    <img src="/Car/public/image/{{$product->prod_img}}" alt="{{$product->prod_name}}">
                        <p></p>
                        <div class="row">
                            <div class="col-3">
                                <img src="/Car/public/image/img/new-3.jpeg" alt="">
                            </div>
                            <div class="col-3">
                                <img src="/Car/public/image/img/new-29.jpeg" alt="">
                            </div>
                            <div class="col-3">
                                <img src="/Car/public/image/img/new-30.jpeg" alt="">
                            </div>
                            <div class="col-3">
                                <img src="/Car/public/image/img/new-32.jpeg" alt="">
                            </div>
                        </div>
                        <div class="detail__info">
                            <!-- <p>OVERVIEW</p> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Tổng quan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Giới thiệu xe</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">Chính sách bảo hành</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row tab__overview">
                                        <div class="col-6">
                                            <div class="detail__title">
                                                <i class="fa fa-braille"></i>
                                                <span>Thông số kỹ thuật</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Chiều dài cơ sở</p>
                                                    <p>Động cơ</p>
                                                    <p>Dung tích công tác</p>
                                                    <p>Mô men xoắn cực đại</p>
                                                </div>
                                                <div class="col-6 ">
                                                    <p> {{ $product->prod_DRC }} </p>
                                                    <p>{{ $product->prod_Engine }} </p>
                                                    <p>{{ $product->prod_HorsePower }} </p>
                                                    <p>{{ $product->prod_MaxTorque }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-4">
                                            <div class="detail__title">
                                                <i style="visibility: hidden;" class="fa fa-gas-pump"></i>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <p>Công suất cực đại</p>
                                                    <p>Tăng tốc</p>
                                                    <p>Vận tốc tối đa</p>
                                                    <p>Sử dụng loại nhiên liệu</p>
                                                </div>
                                                <div class="col-4 ">
                                                    <p>{{ $product->prod_MaxCapacity }}</p>
                                                    <p>{{ $product->prod_Acceleration }}</p>
                                                    <p>{{ $product->prod_MaxSpeed }}</p>
                                                    <p>{{ $product->prod_TypeOfFuel }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="detail__title">
                                                <i class="fa fa-gas-pump"></i>
                                                <span>Tiết kiệm nhiện liệu</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <p>Mức tiêu thụ nhiên liệu, trong thành phố</p>
                                                    <p>Mức tiêu thụ nhiên liệu, ngoài thành phố</p>
                                                    <p>Mức tiêu thụ nhiện liệu kết hợp</p>
                                                </div>
                                                <div class="col-4 ">
                                                    <p>{{ $product->prod_City }}</p>
                                                    <p>{{ $product->prod_Combine }}</p>
                                                    <p>{{ $product->prod_Local }}</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-4 detail__button">
                                            <button type="button" class="btn btn-primary"><a
                                                    href="/Car/public/shedule/{{ $product->prod_id }}"> Đăng ký lái thử
                                                    >></a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="tab__description">
                                        {{ $product->prod_description }}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="guarantee" style="margin-top: 20px;">
                                        <b>1. Nội dung bảo hành</b>
                                        <p> - Bảo hành là công việc sửa chữa, thay thế chi tiết hoặc cập nhật phần mềm
                                            điều khiển cho các hư hỏng do khuyết tật của vật liệu hoặc quá trình lắp ráp
                                            trong điều kiện sản phẩm được sử dụng và bảo dưỡng đúng cách.</p>
                                        <p>- Chi tiết thay thế trong bảo hành là những chi tiết, linh kiện nhỏ nhất mà
                                            Speedy cung cấp phụ tùng chính hãng tại các Nhà phân phối.</p>
                                        <p>- Công việc bảo hành được thực hiện miễn phí cho khách hàng. Speedy hoặc Nhà
                                            phân phối không có trách nhiệm thu hồi và thay thế sản phẩm mới cho người
                                            tiêu dùng nếu việc bảo hành có thể khắc phục được các lỗi chất lượng, lỗi
                                            vật liệu hay lỗi lắp ráp của nhà sản xuất.</p>
                                        <b>2. Thời hạn bảo hành</b>
                                        <p>- Thời hạn bảo hành tiêu chuẩn của xe máy điện Speedy là 03 năm và không hạn
                                            chế số ki lô mét kể từ ngày bán lẻ tới khách hàng ghi trên hóa đơn.</p>
                                        <p>- Riêng đối với các loại ắc quy axit chì, thời hạn bảo hành là 01 năm và
                                            không hạn chế số ki lô mét.</p>
                                        <p>- Phụ tùng được thay thế theo bảo hành xe mới sẽ có thời hạn bảo hành theo
                                            thời hạn bảo hành còn lại của xe.</p>
                                        <b>3. Bảo hành mở rộng</b>
                                        <p>- Speedy có thể mở rộng thêm thời hạn bảo hành trong một số trường hợp đặc
                                            biệt. Việc mở rộng thời hạn bảo hành sẽ được ghi rõ trên trang bìa Sổ Bảo
                                            hành cho những sản phẩm cụ thể. Loại bảo hành này được áp dụng đặc biệt như
                                            một phần của chương trình thúc đẩy bán hàng.</p>
                                        <b>4. Chương trình triệu hồi</b>
                                        <p>Chương trình triệu hồi được áp dụng để xử lý miễn phí các lỗi liên quan đến
                                            chất lượng và liên quan đến an toàn cho các xe đang lưu hành trên thị trường
                                            theo quy định pháp luật. Chương trình triệu hồi sửa chữa được áp dụng cho cả
                                            những xe đã hết thời hạn bảo hành.</p>
                                        <b>5. Bảo hành phụ tùng</b>
                                        <p>Phụ tùng thay thế trong quá trình sửa chữa tại Nhà phân phối của Speedy do
                                            khách hàng chịu chi phí sẽ được bảo hành trong vòng 01 năm kể từ ngày thay
                                            thế cho khách hàng.</p>
                                        <p>Phụ tùng mua nhưng không thay thế tại Nhà phân phối của Speedy sẽ không được
                                            bảo hành theo chính sách</p>
                                        <p>Để nhận được chế độ bảo hành phụ tùng, khách hàng có trách nhiệm lưu trữ hồ
                                            sơ như lệnh sửa chữa, hóa đơn, phiếu thu chứng minh đã thay thế phụ tùng do
                                            Speedy hoặc Nhà phân phối của Công ty Speedy thực hiện.</p>
                                        <b>6. Làm thể nào để nhận được sửa chữa bảo hành</b>
                                        <p>Để nhận được sửa chữa bảo hành miễn phí, khách hàng có trách nhiệm mang xe
                                            đến Nhà phân phối gần nhất của Speedy, không bắt buộc là Nhà phân phối mà
                                            khách hàng đã mua xe. Thông tin về địa chỉ của các Nhà phân phối, các sản
                                            phẩm và dịch vụ có sẵn, quý khách vui lòng truy cập website: </p>
                                        <b>7. Hư hỏng do những nguyên nhân sau đây không thuộc phạm vi bảo hành</b>
                                        <p>Hư hỏng do nguyên nhân của việc sửa chữa/điều chỉnh, thay đổi hoặc hoán cải
                                            trái phép so với thiết kế ban đầu như thay đổi công suất hoặc cấu trúc, hàn
                                            thêm chi tiết v.v…, không phải do các Nhà phân phối của Speedy tiến hành.
                                        </p>
                                        <p>Hư hỏng xảy ra do mục đích sử dụng xe như xe đua, thể thao mạo hiểm,
                                            off-road…</p>
                                        <p>Hư hỏng liên quan đến việc sử dụng phụ tùng không chính hãng và các loại dầu
                                            khác với các thông số kỹ thuật được ghi trên Sổ Hướng dẫn sử dụng.</p>
                                        <p>Rỉ sét, bạc màu sơn, cao su lão hóa, dầu mỡ bị biến chất hay mức độ hao mòn
                                            tự nhiên theo thời gian.</p>
                                        <p>Những hiện tượng xảy ra mà không ảnh hưởng đến chất lượng và sự hoạt động của
                                            xe như tiếng ồn, những rung động nhỏ và vết thấm dầu v.v…</p>
                                        <p>Hư hỏng gây ra bởi các yếu tố bên ngoài như đất, cát, sỏi, đá, vật cứng sắc
                                            nhọn văng vào xe trong quá trình vận hành.</p>
                                        <p>Hư hỏng bề mặt gây ra bởi các yếu tố ngoài tầm kiểm soát như: tàn thuốc lá,
                                            hóa chất, phân động vật, muối, mưa axit và các yếu tố tương tự khác.</p>
                                        <p>Các chi tiết hao mòn tự nhiên và nằm trong danh mục chi tiết thay thế định kỳ
                                            như các loại dầu, mỡ, dây đai, má phanh, lốp v.v…</p>
                                        <p>Hư hỏng do việc không tuân thủ theo lịch bảo dưỡng định kỳ trong Sổ hướng dẫn
                                            sử dụng xe máy điện.</p>
                                        <p>Thay đổi chỉ số ki lô mét, gạch xóa hoặc làm mất trạng thái nguyên bản các
                                            phụ tùng dẫn tới việc không xác định được phụ tùng có được trang bị nguyên
                                            bản trên xe.</p>
                                        <p>Hư hỏng xảy ra trong thời hạn bảo hành nhưng do chậm trễ của người sử dụng
                                            trong việc báo cáo các lỗi hư hỏng này sau khi thời hạn bảo hành hết hiệu
                                            lực.</p>
                                        <p>Trong phạm vi pháp luật cho phép, Speedy từ chối bất cứ trách nhiệm nào cho
                                            các tổn thất hoặc các chi phí khác như phí điện thoại, phí ăn ở, thuê phương
                                            tiện khác, đi lại và thiệt hại kinh doanh hoặc tiêu tốn thời gian.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

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
    <script src="/Car/resources/js/tata.js"></script>
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
    <script>
        var msg = '{{Session::get('NotTestDrive')}}';
        var checkTestDrive = '{{Session::has('NotTestDrive')}}';
        if (checkTestDrive) {
            tata.info(msg, 'Qúy khách vui lòng chọn mẫu xe khác nhé!');

        }
    </script>
    <p style="display: none;"> {{Session::forget('NotTestDrive')}} </p>
</body>

</html>
