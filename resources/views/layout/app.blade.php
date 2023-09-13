<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>24city Laravel</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rtl-shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shortcodes.full.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
</head>
<body class="antialiased">
<main
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="row m-0 pl-2 pr-2">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
