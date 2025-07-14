<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="m-5 p-5 min-h-60">
            <span class="text-5xl">{{ $product->name }}</span>
            <span class="text-3xl m-5">£{{ $product->price }}</span>
            <img class="rounded-xl my-10" src="{{ $product->image }}"><br>
            <p class="text-xl">{{ $product->description }}</p>
        </div>
    </body>
</html>
