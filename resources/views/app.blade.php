<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('/donut.png') }}" type="image/png" />
    <meta name="title" content="Inicio - {{ config('app.name', 'donut') }}" />
    <meta name="description"
        content="Consulta fácilmente tus notas en la Universidad Nacional Autónoma de Nicaragua, sede León. Accede de manera rápida y segura a tus calificaciones más recientes. Simplifica tu experiencia académica con nuestro servicio de consulta de notas en línea." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:title" content="Inicio - {{ config('app.name', 'donut') }}" />
    <meta property="og:description"
        content="Consulta fácilmente tus notas en la Universidad Nacional Autónoma de Nicaragua, sede León. Accede de manera rápida y segura a tus calificaciones más recientes. Simplifica tu experiencia académica con nuestro servicio de consulta de notas en línea." />
    <meta property="og:image" content="{{ asset('/donut.png') }}" />

    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ config('app.url') }}" />
    <meta property="twitter:title" content="Inicio - {{ config('app.name', 'donut') }}" />
    <meta property="twitter:description"
        content="Consulta fácilmente tus notas en la Universidad Nacional Autónoma de Nicaragua, sede León. Accede de manera rápida y segura a tus calificaciones más recientes. Simplifica tu experiencia académica con nuestro servicio de consulta de notas en línea." />
    <meta property="twitter:image" content="{{ asset('/donut.png') }}" />

    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body>
    @inertia
</body>

</html>
