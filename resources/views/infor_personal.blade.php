<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="/Car/resources/css/index.css">
</head>

<body>
    @include('header')
    <div class="container">
        <div id="app">
        
        <forminfor email="{{session('username')}}"  sdt="{{Auth::user()->SDT}}" customer="{{Auth::user()->customer}}" address="{{Auth::user()->address}}" />
        </div>
       
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script>
 
</body>

</html>
