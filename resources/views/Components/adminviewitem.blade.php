<a href="/admin/products/{{ $product->id }}">
    <div class="m-5 p-5 bg-slate-200 rounded-xl">
        <span class="flex items-baseline w-full">
            <span class="flex-none mr-5 text-3xl overflow-hidden">{{ $product->name }}</span>
            <span class="inline-flex justify-end flex-auto mr-5">
                {{ $slot }}
            </span>
        </span>
    </div>
</a>