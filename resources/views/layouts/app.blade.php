<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>{{ config('app.name') }} - @yield('title')</title>
</head>

<body class="bg-custom-1">
    @yield('content')
    </div>
    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
</body>

</html>