<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
            @foreach ($admins as $admin)
                <x-adminsuperpanelitem :admin=$admin></x-adminsuperpanelitem>
            @endforeach
        </div>

        <form class="mt-20 m-10" action="/{{ request()->path() }}/add" method="post">
            @csrf
            <div class="inline-flex flex-auto justify-center w-full"><input type="text" name="add" placeholder="Email" class="p-2 my-2 w-100 bg-gray-200 rounded-t-xl rounded-b-lg outline-none border-b-[0.5vh] border-gray-400 focus:border-indigo-400 default:text-gray-600"><br></div>
            <div class="inline-flex flex-auto justify-center w-full"><input type="submit" value="Add" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>
    </body>
</html>