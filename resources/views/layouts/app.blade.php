<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Gerenciador de Alimentos')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>