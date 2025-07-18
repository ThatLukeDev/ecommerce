<?php

use App\Models\Product;
use App\Models\Home;

?>

<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <form class="m-10" action="{{ request()->path() }}/save" method="post">
            @csrf
            <textarea class="w-full h-100 border-1 border-gray-400" name="description">{{ $home->description }}</textarea>
            <div class="inline-flex justify-center w-full"><input type="submit" value="Save" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>

        <br><br>

        <form class="m-10" action="{{ request()->path() }}/bundle" method="get">
            @csrf
            <div class="inline-flex justify-center w-full"><input type="submit" value="Create bundle" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>

        <form class="m-10" action="{{ request()->path() }}/new" method="post">
            @csrf
            <div class="inline-flex justify-center w-full"><input type="submit" value="New" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>

        @foreach ($items as $item)
            <x-adminitem :product=$item></x-adminitem>
        @endforeach
    </body>
</html>