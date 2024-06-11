<!-- resources/views/layouts/post.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <!-- Добавьте сюда свой хедер -->
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    <!-- Добавьте сюда свой футер -->
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
