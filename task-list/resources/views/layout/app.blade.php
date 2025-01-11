<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900">
    <div class="container mx-auto mt-4">
        @if (session()->has('success'))
        <div>
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('success') }}
            </div>
        </div>
        @endif
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">@yield('title')</h1>
        <div class="text-gray-500 dark:text-gray-400">@yield('content')</div>
    </div>
</body>

</html>
