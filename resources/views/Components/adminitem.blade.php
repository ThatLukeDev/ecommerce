<a href="/admin/products/{{ $product->id }}">
    <div class="m-5 p-5 bg-slate-200 rounded-xl">
        <span class="flex items-baseline w-full">
            <span class="flex-none mr-2 text-3xl overflow-hidden">{{ $product->name }}</span>
            <span class="inline-flex justify-end flex-auto">
                {{ $slot }}
            </span>
            <span class="block mr-2 inline-flex items-baseline">
                <x-basketitembutton request="del" :product=$product><x-monoicon-delete class="size-5" /></x-basketitembutton>
            </span>
        </span>
    </div>
</a>