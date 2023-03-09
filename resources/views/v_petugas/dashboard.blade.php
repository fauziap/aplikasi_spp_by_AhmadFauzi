@extends('layouts.pet')
@section('title', 'Dashboard')
@section('content')
    <div class="items-center mt-16 mx-5">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                    <div class=" flex items-center p-5 ">
                        <i class="fas fa-newspaper text-3xl text-gray-700 mx-4"></i>
                        <h2 class="text-2xl text-gray-700 font-bold">Data Entri</h2>
                    </div>
                    <div class="bg-gray-100 text-right py-2 px-4">
                        <a href="{{ url('/petugas/entri') }}"
                            class="text-gray-600 hover:underline text-sm font-semibold ">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                    <div class=" flex items-center p-5 ">
                        <i class="fas fa-history text-gray-700 text-3xl mx-4"></i>
                        <h2 class="text-2xl text-gray-700 font-bold">History</h2>
                    </div>
                    <div class="bg-gray-100 text-right py-2 px-4">
                        <a href="{{ url('/petugas/history') }}"
                            class="text-gray-600 hover:underline text-sm font-semibold ">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                    <div class=" flex items-center p-5 ">
                        <i class="fas fa-fingerprint text-gray-600 text-3xl mx-4"></i>
                        <h2 class="text-2xl text-gray-700 font-bold">Logout</h2>
                    </div>
                    <div class="bg-gray-100 text-right py-2 px-4">
                        <a href="{{ url('/logout') }}"
                            class="text-gray-600 hover:underline text-sm font-semibold ">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
