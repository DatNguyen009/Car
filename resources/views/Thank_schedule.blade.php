<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you</title>
    <!-- FONT GOOGLE  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- BOOTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- MAIN CSS  -->
    <link rel="stylesheet" href="/Car/resources/css/index.css">
    <style>
        p{
            margin-left: 2rem;
        }
    </style>
</head>


<body>
    @include('header')
    <div class="container-fluid text-center" style="padding-top: 4rem;">
        <h2>Cảm ơn bạn đã đặt lịch lái thử xe của Speedy</h2>
        <h3>Thông tin lịch lái thử bao gồm</h3>
        <div class="infor" style="width: fit-content; margin: 0 auto;">
            <div class="name" style="display: flex;">
                <b >Tên khách hàng:</b>
                <p>{{ session('name') }} {{Session::forget('name')}}  </p>
            </div>
            <div class="nameCar" style="display: flex;">
                <b>Tên xe:</b>
                <p>{{ session('nameCar') }} {{Session::forget('nameCar')}} </p>
            </div>
            <div class="SDT" style="display: flex;">
                <b >SDT:</b>
                <p>{{ session('sdt') }} {{Session::forget('sdt')}}</p>
            </div>
            <div class="dateschedule" style="display: flex;">
                <b >Ngày đặt lịch:</b>
                <p  >{{ session('dateSchedule') }} {{Session::forget('dateSchedule')}}</p>
            </div>
        </div>
        
        <a href="/Car/public/"><button type="button" class="btn btn-primary">Go to back Home</button></a>
    </div>
</body>

</html>
