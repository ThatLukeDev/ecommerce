<a class="m-5" href="products/{{ $product->id }}">
    <div class="w-full h-full p-5 {{ $product->stock > 0 ? 'bg-slate-200' : 'bg-slate-400'}} rounded-xl">
        <img class="w-full rounded-xl" src="{{ $product->image }}"><br>
        <span class="text-3xl max-md:block">{{ $product->name }}</span>
        <span class="text-xl">{{ $product->formattedPrice }}</span>
    </div>
</a>