
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">   

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="BGTurquesa">
<header>
  <div class="header-content-wrapper">
    <div class="logoMinisterio-header"></div>
    <div class="logoTM-header"></div>
  </div>
</header>
    @yield('content')
    </section>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>