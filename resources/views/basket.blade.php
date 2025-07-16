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

        @foreach ($basket as $item => $amount)
            @php
                $listing = Product::find($item);
                $total += $listing->price * $amount;
            @endphp
            <x-basketitem :product=$listing>{{ $amount }}</x-basketitem>
        @endforeach

        @if (count($basket) == 0)
            <a class="m-5">Your basket is empty...</a>
        @else
            <form action="{{ request()->path() }}" method="post" class="m-5">
                @csrf
                <input type="hidden" name="clr" value="true">
                <span class="inline-flex justify-center w-full">
                        <input type="submit" class="mr-2 p-3 bg-gray-300 text-gray-600 rounded-full hover:bg-gray-400 hover:text-white" value="Empty basket">
                </span>
            </form>
        @endif
        <p class="m-10 text-2xl mt-10">Total: £{{ number_format($total, 2) }}</p>
        <span class="max-md:inline-flex justify-center w-full">
            <form action="checkout" method="get" class="m-10">
                <input type="submit" class="mr-2 p-5 px-20 bg-gray-300 rounded-full hover:bg-gray-400 hover:text-white" value="Checkout">
            </form>
        </span>
    </body>
</html>