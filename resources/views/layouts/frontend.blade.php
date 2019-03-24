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
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
                <div class="container-fluid">
                    <img src="{{ asset('img/logo.png') }}" width="25" height="25" class="mr-2 rounded-circle d-inline-block align-top" alt="{{ config('app.name', 'Laravel') }}">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Petitie
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('articles.index') }}" class="nav-link {{ active(['article.*', 'articles.index']) }}">
                                    Nieuws
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Kalender
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    Contact
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fe fe-log-in mr-1"></i> {{ __('Login') }}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link {{ active('notifications.*') }}" href="{{ route('notifications.index') }}">
                                        <i class="fe fe-bell mr-1"></i> {{ $currentUser->unreadNotifications()->count() }}
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $currentUser->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
                                        <a class="dropdown-item" href=" {{ route('account.settings') }}">
                                            <i class="fe fe-sliders mr-1 text-secondary"></i> Instellingen
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fe text-danger mr-1 fe-power"></i> Afmelden
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf {{-- Form field protection --}}
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main role="main">
                @yield('content')
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <span class="copyright">&copy; {{ date('Y') }}, {{ config('app.name') }}</span>

                    <div class="float-right">
                        <a href="" class="text-decoration-none text-white">
                            Gebruikersvoorwaarden
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>