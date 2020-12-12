<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Xác nhận mail</title>
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

    <div class="verifymail" style="display: flex; justify-content: center;margin-top: 40px;">
        <form action="{{route('VerifyEmail')}} " method="post">
            {{csrf_field()}}
            <h3 style="padding-bottom: 20px;">Nhập mã xác nhận</h3>
            @if (session('errors'))
                <p style="color: red; text-align: center;"> {{session('errors')->first('err_code')}} </p>
            @endif
            <input type="text" class="form-control" name="code" style="margin-bottom: 20px; width: 100%;">
            <button type="submit" style="width: 100px; height: 40px; background-color: red;border: none;color: white; margin: 0% 25%;">Xác nhận</button>
        </form>
    </div>
   

</body>
</html>