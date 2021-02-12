<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">   

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="BGTurquesa">
<header>
  <div class="container-fluid">
    <div class="row bgGrisHeader pb-2 ps-2 pe-2 pt-1">
     <div class="col-lg-3  mt-2  col-sm-12 text-sm-center">
      <img class="logoMinisterio" src="img/Logo-Ministerio-web.png" />
     </div>
      <div class="col-lg-2 text-end mt-1 offset-lg-7 col-sm-12 d-none d-md-block d-lg-block">
      <img class="logoTM" src="img/TejiendoMatriaLogo.svg" />
     </div>
    </div>
  </div> 
</header>
    @yield('content')
    </section>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>
