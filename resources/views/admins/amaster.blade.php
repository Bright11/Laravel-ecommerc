<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/./botstrap.css"/>
    <link rel="stylesheet" href="/./admincss.css"/>
    <script src="/./jquery.js"></script>
</head>
<body>
    {{View::make('admins/navbar')}}
    @yield('content')
    {{View::make('admins/footer')}}
</body>
</html>