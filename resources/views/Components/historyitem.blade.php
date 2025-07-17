<a href="{{ $href }}">
    <div class="w-full bg-gray-200 my-5 p-5 rounded-xl">
        <span class="text-2xl">{{ $slot }}</span>
        <span class="text-xl text-gray-600">£{{ number_format($price, 2) }}</span>
    </div>
</a>