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
            <span class="text-3xl m-5">{{ $product->formattedPrice }}</span>
            <img class="md:float-right md:ml-10 w-[100%] md:w-auto md:h-100 rounded-xl max-md:my-10" src="{{ $product->image }}"><br>
            <div class="my-5">
                <a class="text-3xl whitespace-pre-wrap">{{ $product->stock }}</a>
                <p>in stock</p>
            </div>
            <p class="text-xl whitespace-pre-wrap">{{ $product->description }}</p>

            <form action="/{{ request()->path() }}" method="post" class="max-md:flex justify-center w-full mt-10">
                @csrf
                <input {{ $product->stock <= 0 ? 'disabled' : '' }} type="submit" class="my-5 px-10 p-5 bg-gray-300 rounded-full text-center hover:bg-gray-400" value="{{ $product->stock > 0 ? 'Add to basket' : 'None in stock' }}">
            </form>
        </div>
    </body>
</html>
