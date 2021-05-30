<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

        <!-- Css -->
        <link rel="stylesheet" href="/css/style.css">

        <!-- Js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="/js/script.js"></script>
    </head>    
    <body>
        <header class="header-container">
            <div class="logo-container">
                <a href="#">
                    <img src="/img/logo.png" alt="My Game Library">
                </a>
            </div>
            <div class="menu-container">
                <ul class="menu">
                    <li class="menu-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="menu-item">
                        <a href="/games/gamestore">Store</a>
                    </li>
                    <li class="menu-item">
                        <a href="/games/mylibrary">My Library</a>
                    </li>
                    <li class="menu-item">
                        <a href="/games/mygames">My Games</a>
                    </li>
                </ul>
            </div>
            <div class="account-container">
                <ul class="menu">
                    @auth
                        <li class="menu-item">
                            <a href="/dashboard">My Account</a>
                        </li>
                        <li class="menu-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="menu-item">
                            <a href="/login">Login</a>
                        </li>
                        <li class="menu-item">
                            <a href="/register">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </header>
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
            <footer class="footer-container">
                <p>My Game Library &copy; 2021</p>
            </footer>
        </div>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    </body>
</html>