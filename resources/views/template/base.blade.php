<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
    @include('components.header')
    @yield('content')
</body>
</html>
