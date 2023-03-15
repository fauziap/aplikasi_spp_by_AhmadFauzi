<div class="sidebar min-h-screen bg-white w-64 px-6 pt-4 pb-6">
    <div class=" mb-3 border-b-2">
        <h3 class="text-gray-600 pb-3 uppercase text-base font-medium">
            App Pembayaran SPP
        </h3>
    </div>
    <div class="my-5 text-lg font-medium text-gray-600">
        Haii, <span class="capitalize text-gray-700 font-bold">{{Auth::user()->nama}}🖐</span>
    </div>
{{-- {{request()->route()->uri()}} --}}
    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        {{-- @if (Auth::check() && Auth::petugas()->level == 'admin') --}}
        <li class="items-center ">
            <a class=" text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block" href="{{ url('/dashboard') }}">
                <i class="fas fa-dashboard mr-2 text-sm"></i>
                Dashboard</a>
        </li>
        @can('level','admin')
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard/data-siswa' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ route('dasis') }}"><i class="fa-solid fa-users text-blueGray-400 mr-2 text-sm"></i>
                Data Siswa</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard/data-petugas' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ route('dape') }}"><i class="fa-solid fa-user-tie text-blueGray-400 mr-2 text-base"></i>
                Data Petugas</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard/data-kelas' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ route('dake') }}"><i class="fas fa-th-list text-blueGray-400 mr-2 text-sm"></i>
                Data Kelas</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard/data-spp' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ route('daspp') }}"><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                Data SPP</a>
        </li>
        @endcan
        {{-- @endif --}}
        @can('level',['petugas','admin'])
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard/data-entri' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ route('entri') }}"><i class="fas fa-wallet text-blueGray-400 mr-2 text-sm"></i>
                Data Entri</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard/history' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ route('history') }}"><i class="fas fa-history mr-2 text-sm"></i>
                History </a>
        </li>
        <li class="items-center">
            <a class= "text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'logout' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block"
                href="{{ url('/logout') }}"><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                Logout</a>
        </li>
        @endcan

    </ul>
</div>
