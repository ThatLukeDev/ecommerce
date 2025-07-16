<!DOCTYPE html>
<html>
    <head>
        <x-head></x-head>
        <title>Ecommerce</title>
    </head>
    <body class="bg-gray-50">
        <x-navbar></x-navbar>

        <div class="text-gray-800 text-4xl mx-10 mt-10">Welcome {{ Auth::user()->name }}!</div>

        @if (Auth::user()->permission >= 1)
            <a href="admin">
                <div class="text-gray-800 text-xl mx-10 mt-10">You are an admin!</div>
                <div class="text-gray-400 text-md mx-10">View the admin panel</div>
            </a>
        @else
            <div class="m-20 md:m-40"></div>
        @endif

        <form action="/{{ request()->path() }}" method="post" class="m-10 mt-10 md:mt-20">
            @csrf
            <input class="hidden text-3xl w-full" id="srcLink" value="{{ Auth::user()->image }}" name="image">
            <div class="hidden inline-flex justify-center w-full"><input class="hidden my-5" id="fileSelector" type="file"></div>
            <div class="inline-flex justify-center w-full"><a href=""><img id="img" class="w-auto aspect-square size-25 rounded-full max-md:my-10" src="{{ isset(Auth::user()->image) ? Auth::user()->image : '/avatar.jpg' }}"></a></div>
            <input class="text-5xl w-full text-center" value="{{ Auth::user()->name }}" name="name">
            <div class="inline-flex justify-center w-full"><input type="submit" value="Save" class="p-2 my-5 bg-indigo-400 text-white rounded-full w-100"></div>
        </form>

        <a href="/logout"><div class="inline-flex justify-center w-full bottom-20 absolute"><p class="text-gray-400 w-100 text-center">Sign out</p></div></a>
    </body>
    <script>
        let link = document.querySelector("#srcLink");
        let img = document.querySelector("#img");
        let upload = document.querySelector("#fileSelector");

        link.oninput = () => {
            img.src = link.value;
        }
        img.onclick = () => {
            upload.click();
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