<div class="sidebar bg-white w-64 px-6 pt-4 pb-6">
    <div class=" mb-3 border-b-2">
        <h3 class="text-gray-600 pb-3 uppercase text-base font-medium">
            App Pembayaran SPP
        </h3>
    </div>

    <div class="my-5 font-medium">
        Hallo, <span>lalalala</span>
    </div>

    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
        <li class="items-center ">
            <a class=" text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'hal' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block" href="{{ url('/hal') }}">
                <i class="fas fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="items-center">
            <a class="text-sm uppercase pl-3 py-3 {{request()->route()->uri()== 'beda' ? "text-[#fff] bg-blue-500 rounded-r-full" : " text-gray-500 hover:text-blue-600"}} font-medium block""
                href="{{ url('/beda') }}"><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                Landing Page</a>
        </li>
        <li class="items-center">
            <a class="text-gray-500 hover:text-blue-600 text-sm uppercase pl-3 py-3 focus:text-[#fff] focus:bg-blue-500 rounded-r-full font-medium block"
                href="#/profile"><i class="fas fa-user-circle text-blueGray-400 mr-2 text-sm"></i>
                Profile Page</a>
        </li>
        <li class="items-center">
            <a class="text-gray-500 hover:text-blue-600 text-sm uppercase pl-3 py-3 focus:text-[#fff] focus:bg-blue-500 rounded-r-full font-medium block"
                href="#/login"><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                Logout</a>
        </li>

    </ul>
</div>
