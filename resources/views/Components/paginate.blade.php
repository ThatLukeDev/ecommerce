<div class="flex justify-center m-10">
    <a href="?page={{ request('page') > 1 ? request('page') - 1 : 1 }}" class="bg-gray-100 p-5 mr-5 rounded-full">&lt;</a>
    <a class="p-5 rounded-full text-center">Showing page {{ request("page") ? request("page") : 1 }} out of {{ $slot }}</a>
    <a href="?page={{ request('page') < $slot ? request('page') + 1 : $slot }}" class="bg-gray-100 p-5 ml-5 rounded-full">&gt;</a>
</div>