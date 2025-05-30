<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Four Sides Group S.A. de C.V.">

    @include('partials.styles')
    @stack('styles')
    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid d-flex flex-column min-vh-100 p-0">
        @yield('slot')
    </div>

    @include('partials.scripts')
    @stack('javascript')
</body>

</html>