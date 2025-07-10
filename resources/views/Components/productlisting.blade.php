<div class="m-5 p-5 min-h-60 bg-slate-200 rounded-xl">
    <img class="md:float-right w-[100%] md:w-auto md:h-50 rounded-xl" src="{{ $product->image }}"><br>
    <h1 class="text-5xl">{{ $product->name }}</h1>
    <h2 class="text-3xl">{{ $product->price }}</h2>
    <p class="text-xl">{{ $product->description }}</p>
</div>