<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>


    <!-- para que vaya bootsrap -->
    <link rel="stylesheet" href="{{ asset( 'css/bootstrap.min.css')}}">
    <script src="{{ asset("js/jquery-3.4.1.min.js")}}"></script>
    <script src="{{ asset("js/popper.min.js")}}"></script>
    <script src="{{ asset("js/bootstrap.min.js")}}"></script>

    <!-- CSS MIAS -->
    <link rel="stylesheet" href="{{ asset ('css/miCss.css')}}">


</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-primary navbar-fixed-top">
        <a class="navbar-brand" href="{{url('/')}}">
            <!-- href para enlazar esto para ir a otro sitio -->
            <img src=" {{ asset('storage/imagenes/logo.png')}}" style="height: 50px">
        </a>
        <ul class="navbar-nav mr-auto">
            <!-- mr-auto margen Right automatico -->
            <li class="nav-item ">
            <a class="nav-link text-white" href="{{url('coche/create')}}"> Nuevo coche </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link text-white" href="{{route('compactos')}}"  role="button"> Compactos </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-white" href="{{route('electricos')}}" role="button"> Electricos </a>
            </li>
        </ul>
    </nav>

    @yield('principal')
</body>

</html>
