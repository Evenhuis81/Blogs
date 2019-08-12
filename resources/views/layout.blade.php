<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
 </head>

 <body>
    <div id="container">
        <a href="/">Home</a>
        <a href="/blogs">Blogs</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/categories">Categories</a>
        <a href="/profile">Profile</a>
    </div>
    <hr>
    <h1>@yield('pagetitle')</h1>
    <hr>
    @yield('content')
    @yield('button')
</body>

</html>
