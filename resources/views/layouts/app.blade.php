<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel=" stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin=" anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('head')
    <style>
        body{
            background: #474e55;
            color: white;
        }
        .bg-white{
            background-color: #3f454b!important;
        }
        .text_black{
            color: white !important;
        }
        .navbar-brand{
            color: white;
        }
        .nav-link{
            color: white;
        }
        .card{
            background: #50575f!important;
        }
        .form-control{
            background: #bec0c3;
        }
        footer {
            position: absolute;
            bottom: 20px;
            left: 45%;
        }
    </style>
    <style>
        /* Custom styles for sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            /* Adjust the width of the sidebar here */
            width: 250px;
            /* Background color and styling */
            background-color: #343a40;
            color: #fff;
            padding-top: 70px;
            /* Space for the top navigation */
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            width: 50px;
        }

        .sidebar .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 20px auto;
            display: block;
        }

        .sidebar .avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .sidebar ul.navbar-nav {
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .sidebar ul.navbar-nav .nav-item {
            width: 100%;
        }

        .sidebar ul.navbar-nav .nav-link {
            padding: 10px;
            color: #ccc;
        }

        .sidebar ul.navbar-nav .nav-link:hover {
            background-color: #444;
        }

        .content {
            margin-left: 250px;
            /* Adjust based on sidebar width */
            padding: 20px;
        }

        .sidebar-toggle {
            position: absolute;
            top: 0;
            right: -20px;
            background-color: #343a40;
            border: none;
            border-bottom-right-radius: 10px;
            color: #fff;
            padding: 10px;
            cursor: pointer;
        }

        .sidebar-toggle:focus {
            outline: none;
        }

        .capitiliaze {
            text-transform: capitalize;
        }

        .d-none {
            display: none;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                    <ul class="navbar-nav ms-auto">
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
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::user()->name }}
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{ route('members_index') }}">
                                                            Members
                                                        </a>
                                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
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
        @if(Auth::user())
            <div class="sidebar" id="sidebar">
                <div class="text-center" id="sidebar-content">
                    <div class="avatar">
                        <img src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" alt="
                            User Avatar">
                    </div>
                    <h5>Name: {{Auth::user()->name}}</h5>
                    <p class="capitiliaze">Role: {{Auth::user()->role}}</p>
                </div>
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) Tumo Lab 2024
        </footer>
    </div>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar-content').classList.toggle('d-none');
            document.getElementById('sidebar').classList.toggle('collapsed');
        }
    </script>
</body>

</html>