<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="text-gray-800 text-4xl mx-10 mt-10">Welcome {{ Auth::user()->name }}!</div>

        @if (Auth::user()->permission >= 1)
            <a href="admin">
                <div class="text-gray-800 text-xl mx-10 mt-10">You are an admin!</div>
                <div class="text-gray-400 text-md mx-10">View the admin panel</div>
            </a>
        @endif

        <a href="/logout"><div class="inline-flex justify-center w-full bottom-20 absolute"><p class="text-gray-400 w-100 text-center">Sign out</p></div></a>
    </body>
</html>