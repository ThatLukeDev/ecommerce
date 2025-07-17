<x-mail::message>
An item is back in stock

<x-mail::button :url="$url">
View Item
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
