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

        <form class="m-10" action="{{ request()->path() }}/new" method="post">
            @csrf
            <div class="inline-flex justify-center w-full"><input type="submit" value="New" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>
    </body>
</html>