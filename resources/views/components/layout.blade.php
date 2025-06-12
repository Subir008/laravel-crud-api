<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>@yield('title')</title>

    <style>

    </style>

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>

<body >

    <!-- Main section is for login & signup -->
    @section('main')
    @show
    @section('test')
    @show
    @section('home-main')
    @show
    @section('home-table')
    @show


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Adding js code -->
    @section('signin_js')
    @show
    @section('js')
    @show
    @section('signup-js')
    @show

</body>

</html>