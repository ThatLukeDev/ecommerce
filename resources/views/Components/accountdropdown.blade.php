<div {{ $attributes }} class="hidden flex flex-col overflow-hidden bg-gray-200 w-50 fixed right-5 top-21 rounded-b-xl text-gray-800 text-center">
    @if (Auth::check())
        <x-accountdropdownitem href="/account">View account</x-accountdropdownitem>
        <x-accountdropdownitem href="/history">View history</x-accountdropdownitem>
        @if (Auth::user()->permission >= 1)
            <x-accountdropdownitem href="/admin">Admin panel</x-accountdropdownitem>
        @endif
        @if (Auth::user()->permission >= 2)
            <x-accountdropdownitem href="/superpanel">Super panel</x-accountdropdownitem>
        @endif
        <x-accountdropdownitem href="/logout">Sign out</x-accountdropdownitem>
    @else
        <x-accountdropdownitem href="/login">Log in</x-accountdropdownitem>
        <x-accountdropdownitem href="/signup">Sign up</x-accountdropdownitem>
    @endif
</div>