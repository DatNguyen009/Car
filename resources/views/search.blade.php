<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tìm kiếm</title>
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
    <div class="latest__Car" id="inventory">
        <div class="latest__content container">
            <h1>Tìm <span>kiếm</span></h1>
            
            <div class="latest__card">
                
                <div class="row ">
                    @if (count($all_data) == 0)
                        <p> {{"Không tìm thấy kết quả tìm kiếm nào cả"}}</p>
                    @endif
                    @foreach ($all_data as $product)
                    <div class="col-4 card__item">
                        <div class="card">
                            <a href="/Car/public/detail/{{$product->prod_name}}"><img src="/Car/public/image/{{$product->prod_img}}" class="card-img-top" alt="{{$product->prod_name}}"></a>
                            <div class="card-body">
                                <a href="/Car/public/detail/{{$product->prod_name}}">
                                <h5 class="card-title">{{$product->prod_name}}</h5>
                                </a>
                                <p class="card-text text-truncate"> {{$product->prod_description}} </p>
                                <div class="card__icon">
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-cogs"></i>
                                            <span>Động cơ: {{$product->prod_Engine}} </span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-car-side"></i>
                                            <span>Tốc độ tối đa: {{$product->prod_MaxSpeed}} </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-gas-pump"></i>
                                            <span>Tiết kiệm nhiên liệu: {{$product->prod_Combine}} </span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-battery-empty"></i>
                                            <span>Nhiên liệu: {{$product->prod_TypeOfFuel}} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>