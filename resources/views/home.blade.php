<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <a href="/products">
            <h1 class="mx-20 mt-20 text-4xl">Welcome to ecommerce{{ Auth::check() ? ', ' . Auth::user()->name : '' }}!</h1>
            <h2 class="mx-20 text-xl text-gray-600">Click here or on browse to get started.</h2>
        </a>

        <p class="m-20 whitespace-pre-wrap">{{ $home->description }}</p>
    </body>
</html>