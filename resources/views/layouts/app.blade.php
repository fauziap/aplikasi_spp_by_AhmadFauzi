<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran SPP | @yield('title')</title>
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('style')
</head>
<body>

    <div class="flex h-screen bg-gray-200">
        @include('layouts.sidebar.admin')
        <div class="flex items-center lg:w-full flex-col">
            @yield('content')
        </div>
    </div>


    @stack('script')
    @livewireScripts
    <script src="https://kit.fontawesome.com/cc0bc0809d.js" crossorigin="anonymous"></script>
</body>
</html>
