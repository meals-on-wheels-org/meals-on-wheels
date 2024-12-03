<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include CSS (Vite) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Div where your React app will mount -->
    <div id="app" data-page="{{ json_encode($page) }}"></div>

    <!-- Include JS (Vite) -->
    <script type="module" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
