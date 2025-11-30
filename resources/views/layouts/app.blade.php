<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Deportes</title>

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen">
<livewire:categoria />

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 text-xl font-bold">
            Tienda de Deportes
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4">
        {{ $slot }}
    </main>

    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
