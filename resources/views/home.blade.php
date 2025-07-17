<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="grid grid-cols-1 md:grid-cols-2">
            <div>
                <a href="/products">
                    <h1 class="mx-20 mt-20 text-4xl">Welcome to ecommerce{{ Auth::check() ? ', ' . Auth::user()->name : '' }}!</h1>
                    <h2 class="mx-20 text-xl text-gray-600">Click here or on browse to get started.</h2>
                </a>

                <p class="m-20 whitespace-pre-wrap">{{ $home->description }}</p>
            </div>

            @if (count($products) > 0)
                <div class="p-10">
                    <h1 class="pt-20 pb-10 text-4xl">Featured</h1>

                    <div class="w-full grid md:grid-cols-2">
                        @foreach ($products as $product)
                            <x-productlisting :product=$product></x-productlisting>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </body>
</html>