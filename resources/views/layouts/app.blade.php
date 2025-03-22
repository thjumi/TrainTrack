<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Train Track')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <nav class="container mx-auto flex justify-between">
            <div class="space-x-4">
                <a href="{{ route('dashboard') }}" class="hover:text-gray-200">Inicio</a>
                <a href="{{ route('reservas.index') }}" class="hover:text-gray-200">Reservas</a>
            </div>
            <div>
                <a href="{{ route('logout') }}" class="hover:text-gray-200">Cerrar sesión</a>
            </div>
        </nav>
    </header>
    
    <main class="container mx-auto p-6">
        @yield('content')
    </main>
    
    <footer class="bg-gray-800 text-gray-300 text-center py-4 mt-6">
        <p>© 2025 Train Track</p>
    </footer>
</body>
</html>
