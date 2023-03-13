<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran SPP | @yield('title')</title>
    @vite('resources/css/app.css')
    @livewireStyles
    @powerGridStyles
    @stack('style')
</head>
<body>

    <div class="flex h-screen bg-gray-200">
        <div>
            @include('layouts.sidebar.petugas')
        </div>
        <div class="flex items-center overflow-x-auto lg:w-full flex-col">
            @yield('content')
        </div>
    </div>


    @stack('script')
    @livewireScripts
    @powerGridScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/cc0bc0809d.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::scripts />
    <x-livewire-alert::flash />
</body>
</html>
