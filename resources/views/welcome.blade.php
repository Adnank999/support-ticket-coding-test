<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Support Ticket</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
   

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  

    <style>
        .headingText {
            font-size: 3rem !important;
            font-weight: 800 !important;
            text-align: center !important;
            background: linear-gradient(to right, rgb(236, 72, 153), rgb(239, 68, 68), rgb(234, 179, 8));
            color: transparent !important;
            -webkit-background-clip: text !important;
            background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            text-fill-color: transparent !important;
        }
    </style>

</head>

<body class="antialiased ">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gradient-to-r from-gray-700 via-gray-900 to-black selection:bg-red-500 selection:text-white">




        @if (Route::has('login'))


        <livewire:welcome.navigation />


        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">


            <div class="flex flex-col justify-center px-52 text-center">
                <h1 class="headingText">Welcome To Ticket Supporting Platform</h1>
                <p class="text-white">Please Log in to continue</p>
            </div>
        </div>


    </div>
    </div>
    
</body>

</html>