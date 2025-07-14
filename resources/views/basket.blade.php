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

        @foreach ($basket as $item => $amount)
            @php
                $listing = Product::find($item);
            @endphp
            <x-basketitem :product=$listing>{{ $amount }}</x-basketitem>
        @endforeach
    </body>
</html>