<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>

@include('layout-header')

<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>

</body>
</html>