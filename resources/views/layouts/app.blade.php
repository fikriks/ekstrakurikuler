<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="Situs Web Pendaftaran Eksktrakurikuler Untuk Siswa Baru SMK Negeri 4 Kuningan">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset("assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/buble.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/img/brand.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/brand.png')}}" alt="Logo Web" height="50">
                </a>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    @stack('scripts');
    <footer>
        <img src="{{ asset('assets/img/wave-atas.svg') }}" alt="Wave" class="img-fluid">
        <div class="bg-light">
            <div class="container">
            <div class="row text-center">
                <div class="col-12">
                <p>Copyright &copy; {{  date('Y')}} | Made with <i class="mdi mdi-heart text-danger"></i> by <a>eRPeeL SMKN4KNG</a></p>
            </div>
        </div>
        </div>
        </div>
    </footer>
</body>

</html>
