<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @yield('script')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav flex-row mr-auto">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('admin.index') }}">{{__('Home')}}</a>
                    </li>
                    @if(Auth::user())
                    @if(Auth::user()->first()->role_id === 1)
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('admin.project.index') }}">{{__('Visualizza Progetti')}}</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('admin.project.create') }}">{{__('Inserisci Progetto')}}</a>
                    </li>
                    @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav flex-row ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <div class="container py-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
