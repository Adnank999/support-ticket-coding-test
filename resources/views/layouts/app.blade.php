<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Support Ticket') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
    <style>
        .blob-container {
            position: relative;

            height: 100px;

            width: 100%;

            overflow: hide;

        }

        .blob {
            background: radial-gradient(62.61% 62.61% at 95.23% 6.02%, rgb(22, 14, 113) 0%, rgba(19, 13, 92, 0.26) 54.71%, rgba(90, 35, 248, 0) 100%),
                linear-gradient(72.48deg, rgb(239, 81, 109) 2.61%, rgba(106, 103, 227, 0) 56.18%),
                radial-gradient(45.23% 45.23% at 35.11% -11.02%, rgb(121, 54, 174) 0%, rgba(121, 54, 174, 0) 100%),
                radial-gradient(94.51% 124.88% at 94.32% 94.43%, rgba(65, 244, 255, 0.78) 0%, rgba(131, 218, 255, 0.655) 32.29%, rgba(99, 175, 240, 0.396) 64.06%, rgba(43, 90, 211, 0) 100%),
                linear-gradient(313.04deg, rgb(52, 29, 101) 0.93%, rgb(96, 74, 234) 125.68%);
            border-radius: 15rem;
            background-blend-mode: screen, luminosity, saturation, darken, color-dodge, color;
            filter: blur(83px);
            position: absolute;
            top: 0;
            right: 0;

            transform: translateX(-50%);

            height: 200px;
            width: 200px;
            z-index: 10;

        }
    </style>
</head>

<body class="font-sans antialiased ">
    <div class="min-h-screen bg-gray-100 dark:bg-gradient-to-r from-gray-700 via-gray-900 to-black">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>

        </header>
        @endif

        <div class="blob-container">
            <div class="blob"></div>
        </div>


        <!-- Page Content -->
        <main>
            {{ $slot }}

        </main>
    </div>

</body>

</html>