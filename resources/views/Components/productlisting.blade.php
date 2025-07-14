<a href="products/{{ $product->id }}">
    <div class="m-5 p-5 min-h-60 bg-slate-200 rounded-xl">
        <img class="md:float-right md:ml-5 w-[100%] md:w-auto md:h-50 rounded-xl" src="{{ $product->image }}"><br>
        <span class="text-5xl">{{ $product->name }}</span>
        <span class="text-3xl">£{{ $product->formattedPrice }}</span>
        <p class="text-xl">{{ $product->description }}</p>
    </div>
</a>