<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="m-5 p-5 min-h-60">
            <form action="/{{ request()->path() }}" method="post">
                @csrf
                <input class="text-5xl w-full" value="{{ $product->name }}" name="name">
                <br><input class="text-3xl w-full" value="{{ $product->price }}" name="price">
                <input class="text-3xl w-full" id="srcLink" value="{{ $product->image }}" name="image">
                <div class="md:flex">
                    <textarea class="text-xl flex-auto h-100" name="description">{{ $product->description }}</textarea>
                    <img id="img" class="md:float-right md:ml-10 w-[100%] md:w-auto md:h-100 rounded-xl max-md:my-10" src="{{ $product->image }}"><br>
                </div>
                <input class="my-5" id="fileSelector" type="file">
                <input class="text-3xl w-full" value="{{ $product->stock }}" name="stock"> in stock
                <input type="checkbox" {{ $product->featured ? 'checked' : '' }} class="text-3xl w-full" id="srcLink" value="true" name="featured">
                <div class="inline-flex justify-center w-full"><input type="submit" value="Save" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
            </form>
        </div>
    </body>
    <script>
        let link = document.querySelector("#srcLink");
        let img = document.querySelector("#img");
        let upload = document.querySelector("#fileSelector");

        link.oninput = () => {
            img.src = link.value;
        }

        upload.addEventListener("change", () => {
            let file = upload.files[0];

            let reader = new FileReader();
            reader.readAsBinaryString(file);
            reader.onloadend = (e) => {
                if (e.target.readyState == FileReader.DONE) {
                    link.value = `data:${file.type};charset=utf-8;base64, ${btoa(e.target.result)}`;
                    img.src = link.value;
                }
            };
        });
    </script>
</html>
