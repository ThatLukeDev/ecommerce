<a class="m-5" href="products/{{ $product->id }}">
    <div class="w-full h-full p-5 {{ $product->stock > 0 ? 'bg-slate-200' : 'bg-slate-400' }} rounded-xl">
        @if ($product->stock <= 0)
        <div class="relative w-full h-0">
            <p class="text-white text-center bg-gray-600 rounded-full absolute px-5 py-4 m-5 size-20 right-0">No stock</p>
        </div>
        @endif
        <img class="w-full rounded-xl aspect-4/3" src="{{ $product->image }}"><br>
        <span class="text-3xl max-md:block">{{ $product->name }}</span>
        <span class="text-xl">{{ $product->formattedPrice }}</span>
    </div>
</a>