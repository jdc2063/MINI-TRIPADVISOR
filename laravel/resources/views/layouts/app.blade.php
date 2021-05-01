<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/image.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icone.css') }}" rel="stylesheet">
</head>
<body>
    <section class="header">
                    
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <a href="{{ url('/') }}" class="nav-link">
                <h1>HOME</h1>
            </a>
            
        </ul>
        
        <h2> Mini Tripadvisor</h2>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                
                @if (Route::has('login'))
                    <a class="nav-link"  href="{{ route('login') }}"><h4>{{ __('Login') }}</h4></a>                  
                @endif
                <div>
                    @if (Route::has('register'))
                        <a class="nav-link"  href="{{ route('register') }}"><h4>{{ __('Register') }}</h4></a>
                    @endif
                </div>
            @else
                    <a id="navbarDropdown"  class="nav-link" href="/user/{{auth()->user()->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <h4>Mon profil</h4>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="nav-link"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <h4>{{ __('Logout') }}</h4>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
            @endguest
        </ul>
    </section>

        <main class="py-4">
            @yield('content')
        </main>
        <section class="footer">
            <a class="image_link" target="_blank" href="https://github.com/jdc2063"><img src = "/images/icons8-github-48.png" height = "100%"></a>
        
            <a class="image_link" target="_blank" href="https://www.linkedin.com/in/jeremy-da-cruz/"><img src = "/images/icons8-linkedin-48.png" height = "100%"></a>
        </section>
    </div>
</body>
</html>
