<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/web/favicon.png') }}" type="image/x-icon">
    {{-- Title page --}}
    <title>@yield('title')</title>
    {{-- Font family SVN-Gotham --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/6df1d2f167.js" crossorigin="anonymous"></script>
    {{-- Splide --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    {{-- Toast css --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    {{-- TomSelect --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.0/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">


    @vite(['resources/css/app.css', 
    'resources/js/pages/frontend/app.js', 
    'resources/sass/_custom.scss'
    ])
    
    <style>
        body{
            font-family: "SVN-Gotham";
            /* font-weight: 450; */
        }


    </style>
    @stack('styles')
</head>

<body class="">
    @yield('content')   
    
    {{-- Api google map --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7yafJ5DYEcENnmST87Tu1vVkc9YUv8c8&callback=initMap" async defer></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script> --}}
    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    {{-- Toast --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    {{-- Tom Select --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.0/dist/js/tom-select.complete.min.js"></script>
    {{--  --}}
    <script src="{{asset('js/search.js')}}"></script>
    @stack('scripts')
</body>

</html>
