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

        <div class="m-10" action="{{ request()->path() }}" method="post">
            <div class="inline-flex justify-center w-full"><input id="searchV" type="text" placeholder="Search" class="p-2 my-2 w-100 bg-gray-200 rounded-t-xl rounded-b-lg outline-none border-b-[0.5vh] border-gray-400 focus:border-indigo-400 default:text-gray-600"></div>

            <div id="searchdisplay" class="w-full min-h-50 bg-gray-100 p-1 rounded-md">
            </div>
        </div>

        <div class="">
            @foreach (session("bundle") as $item => $amount)
                <x-basketitem :product=Product::find($item)>{{ $amount }}</x-basketitem>
            @endforeach
        </div>

        <form class="m-10" action="{{ session('returnbundle', '/admin') }}" method="get">
            @csrf
            <div class="inline-flex justify-center w-full"><input type="submit" value="Submit" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>
    </body>
    <script>
        let searchbox = document.querySelector("#searchV");
        let searchdisplay = document.querySelector("#searchdisplay");

        searchbox.oninput = () => {
            fetch("/query", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    query: searchbox.value
                })
            }).then(response => response.json()).then(data => data.data).then(data => {
                searchdisplay.innerHTML = "";
                data.forEach(item => {
                    searchdisplay.innerHTML += `<a href="/admin/bundle/add/${item.id}" class="hover:bg-gray-200 block rounded-md p-0.5 pl-2 w-full">${item.name}</a>`;
                });
            });
        }
    </script>
</html>