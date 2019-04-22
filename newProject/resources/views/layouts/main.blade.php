<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}"
    <title>My Portfolio | Topi</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
</head>
<body>

<div class="container">
    <div class="row">
        @include('inc.aside')
        <div class="col-lg-9">
            @include('inc.banner')
            @yield('content')
        </div>
        <hr>
        <div class="row">
            <a href="#">Admin</a>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>