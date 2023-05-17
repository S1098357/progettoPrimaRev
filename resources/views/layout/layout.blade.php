<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CouponBeast</title>
    <link rel="stylesheet" type="text/css" href="{{URL('css\navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{URL('css\footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{URL('css\body.css') }}">
    @yield('customCss')

    <nav>
        <div class="navbar-left">
            <img src="{{URL('img\logo.png') }}" height="200"width="250" alt="Logo">
        </div>
        <div class="navbar-right">
            @include('navItem/onlyRoute', ['route'=>'home'], ['value'=>'Home'])
            @include('navItem/onlyRoute', ['route'=>'catalogo'], ['value'=>'Catalogo'])
            @include('navItem/onlyRoute', ['route'=>'info'], ['value'=>'Info Aziende'])
            @include('navItem/onlyRoute', ['route'=>'faq'], ['value'=>'FAQ'])

            @if(!Auth::check())
                @include('navItem/onlyRoute', ['route'=>'login'], ['value'=>'Login'])
                @include('navItem/onlyRoute', ['route'=>'signup'], ['value'=>'Registrati'])
            @endif

            @if(isset(Auth::User()->nome))
                @if((Auth::User()->role)=='user')
                    @include('navItem/onlyRoute', ['route'=>'Profile'], ['value'=>'Profilo'])
                    @include('navItem/onlyRoute', ['route'=>'modificaProfilo'], ['value'=>'Modifica Profilo'])
                @endif
                @include('navItem/logout')
            @endif

        </div>

    </nav>
</head>
<br>
<body>
@yield('content')
</body>

@include('layout.footer')


</html>
