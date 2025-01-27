<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Toll System')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div id="app" class="flex flex-col justify-between min-h-screen">
        <x-header></x-header>

        <main class="flex justify-center">
            @yield('content')
        </main>

        <x-footer></x-footer>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
