<div>
    @extends('layouts.log')

    @section('title','Login')

    @section('content')
        <div class="bg-gray-50 lg:-mt-10 ">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div class="text-center text-2xl font-bold text-gray-700 mb-4">
                    <p>App Pembayaran SPP</p>
                    <p>By Ahmad Fauzi</p>
                </div>
                <div
                    class="w-full bg-gray-200 rounded-2xl shadow border md:mt-0 sm:max-w-md xl:p-0 text-gray-700 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-2xl text-center font-bold leading-tight tracking-tight text-gray-700 md:text-2xl ">
                            Silahkan login :'~
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="#">
                            <div>
                                <label for="username"
                                    class="block mb-2 text-md font-medium text-gray-900 ">Username</label>
                                <input type="email" name="username" id="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900  sm:text-sm rounded-lg focus:ring-gray-300  block w-full p-2.5  placeholder-gray-400   "
                                    placeholder="name@spp.com" required="">
                            </div>
                            <div>
                                <label for="password"
                                    class="block mb-2 text-md font-medium text-gray-900 ">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-300 block w-full p-2.5  placeholder-gray-400 "
                                    required="">
                            </div>
                            <div>
                                <label class="items-center">
                                    <input type="checkbox" onclick="myFunction()"> <span class="ttext-gray-700 ml-2">Show Password</span>
                                </label>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-1.5 text-center bg-gray-600 dark:hover:bg-gray-700 hover:translate-x-1 transition duration-300 dark:focus:ring-gray-800">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @push('script')
        <script>
            function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>
        @endpush
    @endsection

</div>
