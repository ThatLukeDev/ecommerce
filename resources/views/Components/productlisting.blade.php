<div class="m-5 p-5 bg-slate-200 rounded-xl">
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->price }}</h2>
    <p>{{ $product->description }}</p>
    <img src="{{ $product->image }}">
</div>