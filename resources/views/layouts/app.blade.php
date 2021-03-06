<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}
</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@yield('styles')
@livewireStyles
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @auth()
                    <ul class="navbar-nav mr-auto">
                        <!--Nav Bar Hooks - Do not delete!!-->
                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="fas fa-chart-line"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tools"></i> Administrar
                            </a>
                            <div class="dropdown-menu">
                                @can('centro-list')
                                    <a href="{{ url('/centros') }}" class="dropdown-item"><i class="fas fa-home"></i>
                                        Centros</a>
                                @endcan
                                @can('area-list')
                                    <a href="{{ url('/areas_atencion') }}" class="dropdown-item"><i
                                            class="fas fa-hand-holding-medical"></i> Areas de Atenci??n</a>
                                @endcan
                                @can('role-list')
                                    <a href="{{ url('/roles') }}" class="dropdown-item"><i class="fas fa-user-tag"></i>
                                        Roles</a>
                                @endcan
                                @can('user-list')
                                    <a href="{{ url('/users') }}" class="dropdown-item"><i class="fas fa-users"></i>
                                        Usuarios</a>
                                @endcan
                                @can('empleado-list')
                                    <a href="{{ url('/empleados') }}" class="dropdown-item"><i class="fas fa-users"></i>
                                        Empleados</a>
                                @endcan
                                @can('genero-list')
                                    <a href="{{ url('/generos') }}" class="dropdown-item"><i
                                            class="fas fa-venus-mars"></i> Generos</a>
                                @endcan
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </li>
                    </ul>
                @endauth()

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-2">
        @yield('content')
    </main>
</div>
@livewireScripts
<script type="text/javascript">
    window.livewire.on('closeModal', () => {
        $('#exampleModal').modal('hide');
    });
</script>
@yield('scripts')
</body>

</html>
