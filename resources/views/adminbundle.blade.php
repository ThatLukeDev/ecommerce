<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <form class="m-10" action="{{ request()->path() }}" method="post">
            @csrf
            <div class="inline-flex justify-center w-full"><input id="searchV" type="text" placeholder="Search" class="p-2 my-2 w-100 bg-gray-200 rounded-t-xl rounded-b-lg outline-none border-b-[0.5vh] border-gray-400 focus:border-indigo-400 default:text-gray-600"></div>
            <div class="inline-flex justify-center w-full"><input type="submit" value="Add" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>

        <div class="flex flex-wrap justify-center">
        </div>
    </body>
    <script>
        let searchbox = document.querySelector("#searchV");
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
                console.log(data);
            });
        }
    </script>
</html>