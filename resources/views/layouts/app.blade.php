<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content=" {{csrf_token()}}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
<title>{{$title}}</title>
</head>
<body>
    @include('layouts.navbar')
    <div id="app" class="container">
        @yield('contenido')
    </div>
    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" /> 
    <script src="{{ elixir('js/app.js') }}"></script> 
</body>
</html>