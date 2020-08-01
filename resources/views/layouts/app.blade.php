<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}" >
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img\bg.png')}}" width='150'>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-item textMenu" href="{{ route('login') }}">Entrar</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle textMenu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('Informatica')
                                        <a class="dropdown-item textMenu teste" href="{{ route('user.index') }}">Gestão de Usuário</a>
                                        <a class="dropdown-item textMenu" href="{{ route('role.index') }}">Gestão de Perfis</a>
                                        <a class="dropdown-item textMenu" href="{{ route('permission.index') }}">Gestão de Permissões</a>
                                        <a class="dropdown-item textMenu" href="{{ route('register') }}">Registrar</a>
                                    @endcan
                                        <a class="dropdown-item textMenu" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="d-flex justify-content-center bg-button">
            <div class="mt-2">
                <div class="row">
                    <p class="ml-5"><a href="{{url('/')}}" class="font"><i class="fa fa-home mr-1" aria-hidden="true"></i> Home</a></p>
                    <p class="ml-5"><a href="{{route('branch.index')}}" class="font"><i class="fa fa-phone mr-1" aria-hidden="true"></i> Ramais</a></p>
                    <p class="ml-5"><a href="{{route('menu.index')}}" class="font"><i class="fa fa-cutlery mr-1" aria-hidden="true"></i> Nutrição</a></p>
                    <p class="ml-5"><a href="{{route('notice.index')}}" class="font"><i class="fa fa-television mr-1" aria-hidden="true"></i> Notícias</a></p>
                    <p class="ml-5"><a href="http://192.168.0.30:58080/fortesrh/login.action;jsessionid=0D1A4C34060E36C4E0E9364F4922C26D" class="font" target="_blank"><i class="fa fa-file-text mr-1" aria-hidden="true"></i> Acesso a folha</a></p>
                    <p class="ml-5"><a href="http://mail.gastroclinicahospital.com.br/" target="_blank" class="font"><i class="fa fa-envelope mr-1"></i> Email</a></p>
                </div>
            </div>
        </div>
        <div class="">
            @yield('session')
        </div>
        <main class="container py-4">
            @yield('content')
        </main>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        @yield('scripts')
    </div>
</body>
</html>
