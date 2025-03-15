<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tienda Online') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap & Custom Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
        }

        /* Navbar con sombra y transición */
        .navbar {
            background: linear-gradient(135deg, rgb(39, 66, 82), rgb(27, 45, 63));
            transition: background 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            color: #ffffff !important;
            font-weight: bold;
        }

        /* Botón toggle mejorado */
        .menu-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }
        .menu-icon:hover {
            transform: scale(1.1);
        }

        .menu-icon span {
            position: absolute;
            width: 30px;
            height: 4px;
            background: white;
            border-radius: 4px;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .menu-icon span:nth-child(1) {
            transform: translateY(-10px);
        }
        .menu-icon span:nth-child(3) {
            transform: translateY(10px);
        }
        .menu-icon.active span:nth-child(1) {
            transform: translateY(0) rotate(45deg);
        }
        .menu-icon.active span:nth-child(2) {
            opacity: 0;
        }
        .menu-icon.active span:nth-child(3) {
            transform: translateY(0) rotate(-45deg);
        }

        /* Sidebar con fondo desenfocado */
        .offcanvas {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
        }
        
        /* Efecto en los enlaces del menú */
        .list-group-item {
            border: none;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        .list-group-item a {
            text-decoration: none;
            color: rgb(39, 66, 82);
            transition: color 0.3s ease-in-out;
        }
        .list-group-item:hover {
            background: rgb(220, 230, 240);
            transform: translateX(5px);
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <!-- Botón toggle con animación -->
                <div class="menu-icon" id="menuToggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Tienda Online') }}</a>
            </div>
        </nav>

        <!-- Offcanvas Sidebar -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group">
                    <li class="list-group-item"><a href="/">Inicio</a></li>
                    <li class="list-group-item"><a href="catalogo">Catálogo</a></li>
                    <li class="list-group-item"><a href="carrito">Carrito</a></li>
                    <li class="list-group-item"><a href="#">Mis Órdenes</a></li>
                </ul>
            </div>
        </div>

        <!-- Contenido principal -->
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para animación del menú -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuToggle = document.getElementById("menuToggle");
            const offcanvasSidebar = document.getElementById("offcanvasSidebar");

            menuToggle.addEventListener("click", function () {
                this.classList.toggle("active");
            });

            offcanvasSidebar.addEventListener("hidden.bs.offcanvas", function () {
                menuToggle.classList.remove("active");
            });
        });
    </script>
</body>
</html>
