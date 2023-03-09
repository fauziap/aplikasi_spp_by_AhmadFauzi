<div class="sidebar min-h-screen bg-white w-64 px-6 pt-4 pb-6">
    <div class=" mb-3 border-b-2">
        <h3 class="text-gray-600 pb-3 uppercase text-base font-medium">
            App Pembayaran SPP
        </h3>
    </div>

    <div class="my-5 font-medium">
        Hallo, <span>lalala</span>
    </div>

    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center ">
            <a class=" text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dashboard' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block" href="{{ url('/dashboard') }}">
                <i class="fas fa-dashboard mr-2 text-sm"></i>
                Dashboard</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dasis' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/dasis') }}"><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                Data Siswa</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dape' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/dape') }}"><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                Data Petugas</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'dake' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/dake') }}"><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                Data Kelas</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'daspp' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/daspp') }}"><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                Data SPP</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'entri' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/entri') }}"><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                Data Entri</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'history' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/history') }}"><i class="fas fa-history mr-2 text-sm"></i>
                History </a>
        </li>
        <li class="items-center">
            <a class= "text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'logout' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block"
                href="{{ url('/logout') }}"><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                Logout</a>
        </li>

    </ul>
</div>
