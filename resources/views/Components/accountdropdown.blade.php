<div {{ $attributes }} class="hidden bg-gray-300 w-50 fixed right-5 top-20 rounded-xl text-gray-800 text-center">
    @if (Auth::check())
        <x-accountdropdownitem href="/account">View account</x-accountdropdownitem>
        @if (Auth::user()->permission >= 1)
            <x-accountdropdownitem href="/admin">Admin panel</x-accountdropdownitem>
        @endif
        <x-accountdropdownitem href="/logout">Sign out</x-accountdropdownitem>
    @else
        <x-accountdropdownitem href="/login">Log in</x-accountdropdownitem>
        <x-accountdropdownitem href="/signup">Sign up</x-accountdropdownitem>
    @endif
</div>