<div class="m-5 p-5 bg-slate-200 rounded-xl w-100">
    <span class="">
        <div class="flex-none mr-2 text-3xl">{{ $admin->name }}</div>
        <div class="flex-none mr-2 text-xl">{{ $admin->email }}</div>
        <span class="block max-md:basis-full max-md: mt-2 mr-2 inline-flex items-center">
            <form action="/{{ request()->path() }}/delete" method="post">
                @csrf
                <input type="hidden" name="del" value="{{ $admin->id }}">
                <input id="btns{{ $admin->id }}" type="submit" class="hidden">
                <button id="btnx{{ $admin->id }}" class="mr-2 p-2 bg-gray-300 rounded-full hover:bg-gray-400 hover:text-white"><x-monoicon-delete class="size-5" /></button>
            </form>
        </span>
    </span>
</div>
<script>
    document.querySelector("#btnx{{ $admin->id }}").onclick = () => {
        document.querySelector("#btnx{{ $admin->id }}").click();
    };
</script>