<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <Link href="https://bootswatch.com/4/sketchy/bootstrap.min.css" rel="Stylesheet"> --}}
    <Link href="https://bootswatch.com/4/yeti/bootstrap.min.css" rel="Stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark bg-primary nav-text-size">
                    <a class="navbar-brand navTitle-text-size" href="{{ url('/') }}">{{ config('app.name') }}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">A propos de nous</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href={{ route('blog') }}>Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                            @if (Auth::user()->admin)
                            <div class="dropdown">
                                <button class="btn btn-outline-warning" data-toggle="dropdown">Administration</button>
                                <div class="dropdown-menu">
                                <div class="dropdown-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">Administration</a>
                                </div>
                                <div class="dropdown-item">
                                    <a class="nav-link" href="{{ url('blog/create') }}">Créér un nouvel Article</a>
                                </div>
                                <div class="dropdown-item">
                                    <a class="nav-link" href="{{ url('category/create') }}">Créér une nouvelle catégorie</a>
                                </div>
                            </div>
                            </div>

                            @endif
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Connecté en tant que :
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>

        <main>
            @yield('content')
        </main>
    </div>
        {{-- Section Footer social Media --}}
        <section id="social-media">
            <div class="container">
                <h1>Retrouvez-nous sur les réseaux sociaux</h1>
                <a href="https://www.facebook.com/Nomad-Family-Life-449163025924714/" class="fa fa-facebook"></a>
                <a href="https://www.youtube.com/channel/UCZD1HBWnd4N3cPf9W3htEFA/" class="fa fa-youtube"></a>
                <a href="http://www.instagram.com/nomad_family_life" class="fa fa-instagram"></a>
            </div>
        </section>
    <!-- Footer -->
    <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://guillaume-biausque.fr"> Entre Virtuel & Réalité : developpement web & multimedia</a>
    </div>
    <!-- Copyright -->
    </footer>
<!-- Footer -->
</body>
</html>
