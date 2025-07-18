<?php

use App\Models\Product;

?>

<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="">
            @foreach ($bundles as $bundle)
                <x-adminviewbundle href="/" :product=$bundle></x-adminviewbundle>
            @endforeach
        </div>
    </body>
</html>