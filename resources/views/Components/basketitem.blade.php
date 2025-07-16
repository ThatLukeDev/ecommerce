<a href="products/{{ $product->id }}">
    <div class="m-5 p-5 bg-slate-200 rounded-xl">
        <span class="inline-flex flex-wrap items-baseline w-full">
            <span class="flex-none mr-2 text-3xl">{{ $product->name }}</span>
            <span class="flex-none mr-2 text-xl">{{ $product->formattedPrice }}</span>
            <span class="inline-flex mr-5 md:mr-10 justify-end flex-auto items-center">
                {{ $slot }}
            </span>
            <span class="block max-md:basis-full max-md: mt-2 mr-2 inline-flex items-center">
                <x-basketitembutton request="add" :product=$product><x-monoicon-add class="size-5" /></x-basketitembutton>
                <x-basketitembutton request="sub" :product=$product><x-monoicon-remove class="size-5" /></x-basketitembutton>
                <x-basketitembutton request="del" :product=$product><x-monoicon-delete class="size-5" /></x-basketitembutton>
            </span>
        </span>
    </div>
</a>