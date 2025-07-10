<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        @foreach ($products as $product)
            <x-productlisting :product=$product></x-productlisting>
        @endforeach

        <x-paginate>{{ $products->lastPage() }}</x-paginate>
    </body>
</html>