<div class="sidebar min-h-screen bg-white w-64 px-6 pt-4 pb-6">
    <div class=" mb-3 border-b-2">
        <h3 class="text-gray-600 pb-3 uppercase text-base font-medium">
            App Pembayaran SPP
        </h3>
    </div>

    <div class="my-5 font-medium">
        Hallo, <span>lalalala</span>
    </div>

    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        {{-- <li class="items-center ">
            <a class=" text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'hal' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block" href="{{ url('/hal') }}">
                <i class="fas fa-dashboard"></i> Dashboard</a>
        </li> --}}
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'siswa' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/siswa') }}"><i class="fas fa-history mr-2 text-sm"></i>
                History </a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'logout' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block"
                href="{{ url('/logout') }}"><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                Logout</a>
        </li>

    </ul>
</div>
