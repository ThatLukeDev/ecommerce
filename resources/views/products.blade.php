<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($products as $product)
            <x-productlisting :product=$product></x-productlisting>
        @endforeach
        </div>

        <x-paginate>{{ $products->lastPage() }}</x-paginate>
    </body>
</html>