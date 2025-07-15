<?php

use App\Models\Product;
$total = 0;

?>

<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <h1 class="m-5 text-xl">Congrats on your new purchase(s):</h1>

        @foreach ($basket as $item => $amount)
            @php
                $listing = Product::find($item);
                $total += $listing->price * $amount;
            @endphp
            <x-checkoutitem :product=$listing>{{ $amount }}</x-basketitem>
        @endforeach

        <p class="m-10 text-2xl mt-10">Total: £{{ number_format($total, 2) }}</p>
    </body>
</html>