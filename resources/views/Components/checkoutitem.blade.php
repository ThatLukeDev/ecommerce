<a href="products/{{ $product->id }}">
    <div class="m-5 p-5 bg-slate-200 rounded-xl">
        <span class="inline-flex flex-wrap items-baseline w-full">
            <span class="flex-none mr-2 text-3xl">{{ $product->name }}</span>
            <span class="flex-none mr-2 text-xl">{{ $product->formattedPrice }}</span>
            <span class="inline-flex mr-5 md:mr-10 justify-end flex-auto">
                {{ $slot }}
            </span>
        </span>
    </div>
</a>