<!DOCTYPE html>
<!--
Template Name: Midone - Laravel admin Dashboard Starter Kit
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('images/web/favicon.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ env("APP_DESCRIPTION") }}">
    <meta name="keywords" content="{{ env("APP_KEYWORDS") }}">
    <meta name="author" content="{{ env("APP_AUTHOR") }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('title')
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <script src="https://kit.fontawesome.com/6df1d2f167.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body  >
    @yield('auth')
</body>

</html>
