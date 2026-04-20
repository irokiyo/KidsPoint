<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidPoint</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>
<body>
    <header class="header">
        @yield('header')
    </header>
    <main class="main">
        @if (session('error'))
        <p class="flash__message error" onclick="this.remove()">
            {{ session('error') }}
        </p>
        @endif

        @if (session('success'))
        <p class="flash__message success" onclick="this.remove()">
            {{ session('success') }}
        </p>
        @endif

        @yield('content')
    </main>
</body>
</html>

