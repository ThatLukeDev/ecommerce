<?php

use App\Models\Product;

?>

<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        @foreach ($items as $item)
            <x-adminitem :product=$item></x-adminitem>
        @endforeach
    </body>
</html>