<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" href="https://img.icons8.com/nolan/64/internet.png">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <span>
            <strong><-------Manejo de inventario------></strong>
        </span>
        <span>
            <a href="{{route('products.index')}}">Productos</a>
            <a href="{{route('movements.index')}}">Movimeintos</a>
        </span>
    </nav>
    @yield('content')
</body>
</html>