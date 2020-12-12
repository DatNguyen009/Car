<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suggest car</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="/Car/resources/css/index.css">
</head>

<body>
    @include('header')
    <div class="container">
        {{-- <div class="row ">
            @foreach ($products as $product)
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
                                        <i class="fa fa-battery-empty"></i>
                                        <span>Nhiên liệu: {{ $product->prod_TypeOfFuel }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div> --}}
    </div>
</body>

</html>
