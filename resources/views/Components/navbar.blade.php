<div class="min-h-25"></div>
<nav class="bg-gray-800 text-white p-5 top-0 fixed w-full inline-flex">
    <span class="peer max-md:has-[:hover]:w-full order-1000 group md:flex-auto inline-flex items-center bg-gray-700 p-2 mr-10 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 m-1 md:mr-2" viewBox="0 -960 960 960" fill="#e3e3e3"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
        <form action="{{ request()->path() }}" method="get" class="flex-auto">
            <input type="hidden" name="page" value="1" class="hidden">
            <input type="text" name="query" value="{{ request('query') }}" class="w-full hidden group-has-[:hover]:inline md:inline outline-none">
        </form>
    </span>
    <span class="order-1001 p-2 bg-gray-700 rounded-full inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M221-120q-27 0-48-16.5T144-179L42-549q-5-19 6.5-35T80-600h190l176-262q5-8 14-13t19-5q10 0 19 5t14 13l176 262h192q20 0 31.5 16t6.5 35L816-179q-8 26-29 42.5T739-120H221Zm-1-80h520l88-320H132l88 320Zm260-80q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM367-600h225L479-768 367-600Zm113 240Z"/></svg>
    </span>
    <x-navitem href="/">Home</x-navitem>
    <x-navitem href="products">Browse</x-navitem>
</nav>