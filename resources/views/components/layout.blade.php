<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? '' }}</title>
</head>

<body>
    <nav class="flex items-center justify-between p-4 bg-indigo-600">
        <a href="{{ route('home') }}" class="text-white">Home</a>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white">Logout</button>
            </form>
        @endauth
    </nav>
    <div class="w-full mx-auto mt-5 max-w-7xl">
        <h1 class="mb-2 text-3xl font-semibold text-gray-900">{{ $title }}</h1>

        @if (session('success'))
            <div class="p-4 my-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="font-medium">Success alert!</span> {{ session('success') }}
            </div>
        @endisset

        {{ $slot }}
</div>
</body>

</html>
