<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">

</head>
<body>
    <div class="container d-flex flex-column align-items-center">
        <img src="{{ asset('img/BGP.png') }}" alt="Logo" class="mb-3" style="max-width: 150px;">
        <div class="auth-container">
            @yield('content')
        </div>
    </div>
</body>
</html>
