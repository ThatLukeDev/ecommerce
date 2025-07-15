<form action="/{{ request()->path() }}" method="post">
    @csrf
    <input type="hidden" name="{{ $request }}" value="{{ $product->id }}">
    <input type="submit" class="mr-2 p-2 bg-gray-300 rounded-full hover:bg-gray-400 hover:text-white" value="{{ $slot }}">
</form>