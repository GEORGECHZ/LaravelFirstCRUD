<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Add custom styles here */
    </style>
    @livewireStyles
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<body>
    <header class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">
            <img src="https://cdn-icons-png.flaticon.com/256/8092/8092234.png" alt="Your Logo" width="30"
                height="30" class="d-inline-block align-top">
            Fiscal.net
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('.welcome') }}">Inicio <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Recursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h1 class="display-4">Normalizando sus datos fiscales</h1>
                <p class="lead">Obtener control y conocimientos de su información financiera</p>
            </div>
        </div>

        @yield('content')

    </main>

    <footer class="text-center text-muted py-3">
        <p>&copy; 2024 Cositec</p>
    </footer>

    @livewireScripts
</body>

</html>
