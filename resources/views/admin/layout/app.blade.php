<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link href="{{ asset('images/web/favicon.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ env("APP_DESCRIPTION") }}">
    <meta name="keywords" content="{{ env("APP_KEYWORDS") }}">
    <meta name="author" content="{{ env("APP_AUTHOR") }}">
    @yield('title')
    <!-- BEGIN: CSS Assets-->
     @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js', 'resources/dist/css/_app.css'])
     <script src="https://cdn.tailwindcss.com"></script>
       {{-- Ckeditor --}}

<!-- END: Head -->
<body class="text-base">
  @yield('content')

  <script src="{{ asset('dist/js/_app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @stack('scripts')
  @stack('modals')
</body>

</html>
