<form action="/{{ request()->path() }}" method="post">
    @csrf
    <input type="hidden" name="{{ $request }}" value="{{ $product->id }}">
    <input id="btns{{ $product->id }}" type="submit" class="hidden">
    <button id="btnx{{ $product->id }}" class="mr-2 p-2 bg-gray-300 rounded-full hover:bg-gray-400 hover:text-white">{!! $slot !!}</button>
</form>
<script>
    document.querySelector("#btnx{{ $product->id }}").onclick = () => {
        document.querySelector("#btnx{{ $product->id }}").click();
    };
</script>