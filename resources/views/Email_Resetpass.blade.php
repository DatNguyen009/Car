
<div class="email ">
    {{Session::put('email', $name)}}
    <h2>Speedy</h2>
    <p>Chào {{$name}},</p>
    <p>Chúng tôi nhận được yêu cầu đổi mât khẩu cho tài khoản của bạn.</p>
    <p>Để đặt lại mật khẩu vui lòng bấm vào địa chỉ liên kết bên dưới:</p>
    <a href="http://localhost:8080/Car/public/Newpass"><button type="button" style="    width: 100px;
    height: 40px;
    color: white;
    background: #f33d56;
    border: none;" class="btn btn-success">Đổi mật khẩu</button></a>

</div>
