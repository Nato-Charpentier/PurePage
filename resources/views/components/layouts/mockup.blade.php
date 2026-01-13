<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Votre site' }}</title>

    <link rel="icon" href="{{ asset('img/purepage-favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>


<body class="bg-neutral-950 text-white">

    {{-- ❌ PAS DE HEADER PUREPAGE --}}
    {{-- Chaque template gère SON menu --}}

    <main>
        {{ $slot }}
    </main>

    {{-- ❌ PAS DE FOOTER PUREPAGE --}}
    {{-- Chaque template gère SON footer --}}

    {{-- Scripts templates --}}
    @stack('scripts')

</body>

</html>