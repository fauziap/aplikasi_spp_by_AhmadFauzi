@extends('layouts.adm')
@section('title', 'Dashboard')
@section('content')

    @can('level', 'admin')
        <div class="items-center mt-16 mx-5">
            {{-- <div class="mb-5 mt-2">
                <h2 class="text-2xl text-gray-600 font-semibold">Hello, <span class="text-gray-700 font-bold capitalize">{{Auth::user()->nama}}</span></h2>
            </div> --}}
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                        <div class=" flex items-center p-5 ">
                            <i class="fa-solid fa-users text-3xl text-gray-700 mr-7"></i>
                            <h2 class="text-2xl text-gray-700 font-bold">Data Siswa</h2>
                        </div>
                        <div class="bg-gray-100 text-right py-2 px-4">
                            <a href="{{ route('dasis') }}"
                                class="text-gray-600 hover:underline text-sm font-semibold ">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                        <div class=" flex items-center p-5 ">
                            <i class="fa-solid fa-user-tie text-gray-700 text-3xl mx-4"></i>
                            <h2 class="text-2xl text-gray-700 font-bold">Data Petugas</h2>
                        </div>
                        <div class="bg-gray-100 text-right py-2 px-4">
                            <a href="{{ route('dape') }}"
                                class="text-gray-600 hover:underline text-sm font-semibold ">Selengkapnya</a>
                        </div>
                    </div>
                    {{-- <x-card.card>
                </x-card.card> --}}
                </div>
                <div>
                    <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                        <div class=" flex items-center p-5 ">
                            <i class="fas fa-th-list text-gray-600 text-3xl mx-4"></i>
                            <h2 class="text-2xl text-gray-700 font-bold">Data Kelas</h2>
                        </div>
                        <div class="bg-gray-100 text-right py-2 px-4">
                            <a href="{{ route('dake') }}"
                                class="text-gray-600 hover:underline text-sm font-semibold ">Selengkapnya</a>
                        </div>
                    </div>
                    {{-- <x-card.card>
                </x-card.card> --}}
                </div>
            </div>
        </div>
    @endcan
    @can('level', 'petugas')
        <div class="items-center mt-16 mx-5">
            {{-- <div class="mb-5 mt-2">
                <h2 class="text-2xl text-gray-600 font-semibold">Hello, <span class="text-gray-700 capitalize font-bold">{{Auth::user()->nama}}</span></h2>
            </div> --}}
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                        <div class=" flex items-center p-5 ">
                            <i class="fas fa-wallet text-3xl text-gray-700 mx-4"></i>
                            <h2 class="text-2xl text-gray-700 font-bold">Data Entri</h2>
                        </div>
                        <div class="bg-gray-100 text-right py-2 px-4">
                            <a href="{{ route('entri') }}"
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
                            <a href="{{ route('history') }}"
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
    @endcan
@endsection
