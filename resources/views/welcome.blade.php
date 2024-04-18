<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <header class="flex justify-center bg-indigo-50">
        <a class="p-2 m-2" href="">Inicio</a>
        <a class="p-2 m-2" href="">Acerca de</a>
        <a class="p-2 m-2" href="">Contacto</a>
    </header>
    @if (session()->has('status'))
        <p>{{ session()->get('status') }}</p>
    @endif
    <main>
        Main
        <livewire:CreateNote />
    </main>
    <footer>
        Footer
    </footer>
</body>

</html>
