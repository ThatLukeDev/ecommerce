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
            @foreach (session("bundle", []) as $item => $amount)
                <x-adminviewitem :product=Product::find($item)>{{ $amount }}</x-adminviewitem>
            @endforeach
        </div>

        <form class="m-10" action="/admin/bundle" method="get">
            @csrf
            <div class="inline-flex justify-center w-full"><input type="submit" value="Edit contents" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>

        <form class="m-10" action="/admin/bundle/create" method="post">
            @csrf
            <div class="inline-flex justify-center w-full"><input type="text" name="name" placeholder="Name" class="p-2 my-2 w-100 bg-gray-200 rounded-t-xl rounded-b-lg outline-none border-b-[0.5vh] border-gray-400 focus:border-indigo-400 default:text-gray-600"></div>
            <div class="inline-flex justify-center w-full"><input type="submit" value="Save" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>
    </body>
</html>