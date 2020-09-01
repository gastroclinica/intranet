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

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles/welcome.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles/defaults.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}" >
    <link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="shortcut icon" href="{{asset('img/logo-favicon.png')}}" type="image/x-icon">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img\bg.png')}}" width='150'>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="ml-5"><a href="{{url('/')}}">Home</a></li>
                            <li class="ml-5"><a href="{{route('branch.index')}}">Ramais</a></li>
                            <li class="ml-5"><a href="{{route('menu.index')}}">Nutrição</a></li>
                            <li class="ml-5"><a href="{{route('notice.index')}}">Notícias</a></li>
                            <li class="dropdown ml-5">
                                <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Qualidade</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="https://forms.gle/RTUq6gfYkTpvsLHLA" class="dropdown-item" target="_blank">Notificação de Eventos Adversos</a>
                                    <a href="https://forms.gle/aRHb3j8kBMAWTLis8" class="dropdown-item" target="_blank">Registro de Não Conformidade</a>
                                </div>
                            </li>
                            <li class="ml-5"><a href="http://192.168.0.30:58080/fortesrh/login.action;jsessionid=0D1A4C34060E36C4E0E9364F4922C26D" target="_blank">Acesso a folha</a></li>
                            <li class="ml-5"><a href="http://mail.gastroclinicahospital.com.br/" target="_blank">Email</a></li>
                        @guest
                        <li class="ml-5"><a class="" href="{{ route('login') }}">Entrar</a>
                        </li>
                        @else
                            <li class="dropdown ml-5">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('Informatica')
                                        <a class="dropdown-item" href="{{ route('user.index') }}">Gestão de Usuário</a>
                                        <a class="dropdown-item" href="{{ route('role.index') }}">Gestão de Perfis</a>
                                        <a class="dropdown-item" href="{{ route('permission.index') }}">Gestão de Permissões</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">Registrar</a>
                                    @endcan
                                        <a class="dropdown-item" href="{{ route('logout') }}"
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
        <div class="">
            @yield('session')
        </div>
        <main class="container col-10">
            @yield('content')
        </main>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        @yield('scripts')
    </div>
</body>
</html>
