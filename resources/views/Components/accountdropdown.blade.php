<div {{ $attributes }} class="hidden bg-gray-200 w-3/4 md:w-100 fixed right-1/8 md:right-5 top-20 rounded-xl text-gray-800 text-center">
    @if (Auth::check())
        <a href="/account"><div class="p-5 hover:bg-gray-300 rounded-xl">View account</div></a>
        @if (Auth::user()->permission >= 1)
            <a href="/admin"><div class="p-5 hover:bg-gray-300 rounded-xl">Admin panel</div></a>
        @endif
        <a href="/logout"><div class="p-5 hover:bg-gray-300 rounded-xl">Sign out</div></a>
    @else
        <a href="/login"><div class="p-5 hover:bg-gray-300 rounded-xl">Log in</div></a>
        <a href="/signup"><div class="p-5 hover:bg-gray-300 rounded-xl">Sign up</div></a>
    @endif
</div>