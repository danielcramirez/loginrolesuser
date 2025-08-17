<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Laravel</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; background: #f4f6f9; }
        .sidebar { min-height: 100vh; background: #1e293b; color: #fff; }
        .sidebar a { color: #fff; text-decoration: none; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: #334155; }
        .sidebar .nav-link { padding: 12px 20px; }
        .sidebar .nav-header { padding: 10px 20px; font-size: 0.9rem; color: #94a3b8; }
        .content-area { padding: 2rem; }
        .navbar { background: #2563eb; }
        .navbar .navbar-brand, .navbar .nav-link, .navbar .navbar-text { color: #fff !important; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Panel Laravel</a>
            @auth
                <span class="navbar-text ms-auto">
                    {{ Auth::user()->name }} {{ Auth::user()->lastname ?? '' }}
                </span>
            @endauth
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            @auth
            <nav class="col-md-2 d-none d-md-block sidebar py-4">
                <div class="nav flex-column">
                    <div class="nav-header">MENÚ</div>
                    <a href="/" class="nav-link active">Inicio</a>
                    <div class="nav-header mt-3">GESTIÓN</div>
                    <a href="{{ route('users.index') }}" class="nav-link">Usuarios</a>
                    <a href="{{ route('roles.index') }}" class="nav-link">Roles</a>
                    <a href="{{ route('permissions.index') }}" class="nav-link">Permisos</a>
                    <div class="nav-header mt-3">OTROS</div>
                    <a href="#" class="nav-link">Configuración</a>
                </div>
            </nav>
            @endauth
            @auth
            <main class="col-md-10 ms-sm-auto content-area">
                @yield('content')
            </main>
            @else
            <main class="d-flex justify-content-center align-items-center vh-100 vw-100" style="background: #f4f6f9;">
                @yield('content')
            </main>
            @endauth
        </div>
    </div>
    <footer class="text-center py-3 text-muted small">&copy; 2025 Tu Empresa</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
