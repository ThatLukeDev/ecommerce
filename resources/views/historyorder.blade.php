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

        @foreach ($order->products()->get() as $listing)
            @php
                $amount = $ordered->where("product_id", $listing->id)->first()->amount;
                $total += $listing->price * $amount;
            @endphp
            <x-checkoutitem :product=$listing>{{ $amount }}</x-basketitem>
        @endforeach

        <p class="m-10 text-2xl mt-10">Total: £{{ number_format($total, 2) }}</p>
    </body>
</html>