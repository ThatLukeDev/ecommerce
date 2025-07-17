<?php

use App\Models\OrderProduct;

?>

<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="m-10">
            @foreach ($history as $item)
                @php
                    $price = Cache::rememberForever('order.price.' . $item->uuid, function () use ($item) {
                        $total = 0;
                        $ordered = OrderProduct::where("order_id", $item->id)->get();
                        foreach ($item->products()->get() as $listing) {
                            $amount = $ordered->where("product_id", $listing->id)->first()->amount;
                            $total += $listing->price * $amount;
                        }
                        return $total;
                    });
                @endphp
                <x-historyitem href="/history/{{ $item->uuid }}" :price=$price>{{ date('d/m/Y', strtotime($item->created_at)) }}</x-historyitem>
            @endforeach
        </div>

        <x-paginate>{{ $history->lastPage() }}</x-paginate>
    </body>
</html>