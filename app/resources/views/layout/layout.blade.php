<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{'js/app.js'}}"></script>

        <title>@section('title')Laravel shop:: @show</title>
    </head>
    <body>
       <div class="wrap">
           @include('layout.header')

           @yield('content')

           @include('layout.footer')
       </div>
    </body>
</html>
