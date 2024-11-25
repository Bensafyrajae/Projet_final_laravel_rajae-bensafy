<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased ">
    <div class="w-full h-[100vh] flex px-5 justify-between items-center pt-6 sm:pt-0 bg-[#dbeafe]">
        <!-- Icône animée -->
        <div class="w-[100vw] h-full flex justify-center ">
            <dotlottie-player 
                src="https://lottie.host/6c7dd6a9-c4a9-4fe7-934c-125d3d155727/7709xV3sFz.lottie" 
                background="transparent" 
                speed="1" 
                style="width: 33vw; height: 100vh;" 
                class="w-full h-full rounded-lg "
                loop autoplay>
            </dotlottie-player>
        </div>
    
        <!-- Formulaire -->
        <div class="w-[110vw] h-[110vh] text-black flex items-center justify-center mt-6 px-8 py-6 bg-gradient-to-r bg-white via-blue-600 to-blue-700 text-white  rounded-xl">
            {{ $slot }}
        </div>
    </div>
    
</body>

</html>
