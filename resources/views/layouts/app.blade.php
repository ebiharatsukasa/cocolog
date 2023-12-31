<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') | {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link rel="shortcut icon" href="{{ asset('/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">    
    <style>body { font-family: 'Zen Kaku Gothic New', sans-serif; }</style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.0/Chart.bundle.js" integrity="sha512-Q9b0myMAI+IqHh5ldQJTh3ZXkVHwlcVF+H6+LF/QU3n0XmQp7w/kjapf+I3os0GhvJcZXCr5dAhhs5AbiZafwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- autoComplete.js -->
    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
</head>
<body class="Zen Kaku Gothic New bg-first text-fourth antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header>
                <div class="flex flex-wrap mt-12 sm:mt-24 lg:mt-32 px-6 sm:px-12 flex-col items-center text-center">
                    <x-message :message="session('message')" />
                    <x-validation-errors :message="session('message')" />
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @include('layouts.footer')
    </div>
</body>

</html>
