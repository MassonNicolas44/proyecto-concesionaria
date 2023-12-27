<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ 'home' }}">
                    Tutankamon
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Inicio') }}</a>
                            </li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif
     
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('home')}} ">Inicio </a>
                        </li>

                        @if(Auth::user()->status=="Habilitado")

                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Vehiculo
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" >
                                        <a class="nav-link" href="{{ route('car.list') }}">Listado</a>
                                    </a>

                                    <a class="dropdown-item" >
                                        <a class="nav-link" href=" {{ route('car.create')}} ">Añadir</a>
                                    </a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Marca
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item">
                                        <a class="nav-link" href=" {{ route('brand.list')}} ">Listado</a>
                                    </a>

                                    <a class="dropdown-item">
                                        <a class="nav-link" href=" {{ route('brand.create')}} ">Añadir</a>
                                    </a>

                                    <a class="dropdown-item">
                                        <a class="nav-link" href=" {{ route('brand.edit')}} ">Modificar</a>
                                    </a>

                                </div>

                            </li>

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Tipo de Motor
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item">
                                        <a class="nav-link" href=" {{ route('engine.list')}} ">Listado</a>
                                    </a>

                                    <a class="dropdown-item">
                                        <a class="nav-link" href=" {{ route('engine.create')}} ">Añadir</a>
                                    </a>

                                    <a class="dropdown-item">
                                        <a class="nav-link" href=" {{ route('engine.edit')}} ">Modificar</a>
                                    </a>

                                </div>

                            </li>

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Clientes
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                    <a class="dropdown-item">
                                        <a class="nav-link" href="{{ route('customer.list') }}">Listado</a>
                                    </a>

                                    <a class="dropdown-item">
                                        <a class="nav-link" href="{{ route('customer.create') }}">Añadir</a>
                                    </a>

                                </div>

                            </li>

                            @if(Auth::user()->rol=="Administrador")

                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Personal Administrativo
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item">
                                            <a class="nav-link" href="{{ route('user.list') }}">Listado</a>
                                        </a>

                                        <a class="dropdown-item">
                                            <a class="nav-link" href="{{ route('user.create') }}">Añadir</a>
                                        </a>

                                    </div>

                                </li>
                            @endif
                        
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sale.list') }}">{{ __('Ventas') }}</a>
                            </li>

                        @endif

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }} ({{ Auth::user()->rol }})
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('user.editConfig') }}">
                                        {{ __('Configuracion') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
