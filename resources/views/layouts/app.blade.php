<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand w-auto" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav w-75">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('article.create'))
                                <li class="nav-item w-100">
                                    <a class="nav-link " href="{{ route('article.create') }}">{{ __('Cadastrar Noticias') }}</a>
                                </li>
                            @endif

                            @if (Route::has('article.index'))
                                <li class="nav-item w-100">
                                    <a class="nav-link" href="{{ route('article.index') }}">{{ __('Exibir Noticias') }}</a>
                                </li>
                            @endif
                        @else
                        @endguest
                        <div class="input-group w-100">
                            <form class="form-inline" method="get" action="{{ route('article.search') }}">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="term" placeholder=""
                                           aria-label="" required aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="container">
            <p  class="text-center">DESENVOLVIDO POR ELY GALDINO</p>
        </footer>
    </div>
</body>
</html>
