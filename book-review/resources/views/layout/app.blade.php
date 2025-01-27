<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body class="bg-gray-200 p-4 min-h-screen text-gray-800 font-normal leading-relaxed tracking-wide">
    <div class="container mx-auto max-w-3xl px-4">
        <h1 class="text-8xl font-black text-center uppercase">@yield('title')</h1>
    </div>
    <div class="flex flex-col items-center justify-center gap-8 mt-8 text-gray-600">
        @yield('content')
    </div>
</body>

</html>
