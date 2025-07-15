<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <form class="mt-50 m-10" action="{{ request()->path() }}" method="post">
            @csrf
            <div class="inline-flex justify-center w-full"><input type="text" name="email" placeholder="Username / Email" class="p-2 my-2 w-100 bg-gray-200 rounded-t-xl rounded-b-lg outline-none border-b-[0.5vh] border-gray-400 focus:border-indigo-400 default:text-gray-600"></div>
            <div class="inline-flex justify-center w-full"><input type="password" name="password" placeholder="Password" class="p-2 my-2 w-100 bg-gray-200 rounded-t-xl rounded-b-lg outline-none border-b-[0.5vh] border-gray-400 focus:border-indigo-400 default:text-gray-600"></div>
            <div class="inline-flex justify-center w-full"><input type="submit" value="Log in" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
            <div class="inline-flex justify-center w-full"><p class="{{ isset($error) ? '' : 'hidden' }} text-red-400 mb-5">Username or password does not match</p></div>
            <a href="signup"><div class="inline-flex justify-center w-full"><p class="text-gray-400 w-100 text-center">Don't want to login? Sign up instead</p></div></a>
        </form>
    </body>
</html>