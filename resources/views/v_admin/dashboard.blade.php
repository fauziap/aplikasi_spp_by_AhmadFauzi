@extends('layouts.adm')
@section('title', 'Dashboard')
@section('content')

    <div class="items-center mt-16 mx-5">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                    <div class=" flex items-center p-5 ">
                        <i class="fa-solid fa-users text-3xl mr-7"></i>
                        <h2 class="text-2xl text-gray-700 font-bold">Data Siswa</h2>
                    </div>
                    <div class="bg-gray-100 text-right py-2 px-4">
                        <a href="/" class="text-gray-600 hover:underline text-sm font-semibold">Read more</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                    <div class=" flex items-center p-5 ">
                        <i class="fa-solid fa-users text-3xl mr-7"></i>
                        <h2 class="text-2xl text-gray-700 font-bold">Data Siswa</h2>
                    </div>
                    <div class="bg-gray-100 text-right py-2 px-4">
                        <a href="/" class="text-gray-600 hover:underline text-sm font-semibold">Read more</a>
                    </div>
                </div>
                {{-- <x-card.card>
                </x-card.card> --}}
            </div>
            <div>
                <div class="bg-white shadow-lg w-80  rounded-lg overflow-hidden">
                    <div class=" flex items-center p-5 ">
                        <i class="fa-solid fa-users text-3xl mr-7"></i>
                        <h2 class="text-2xl text-gray-700 font-bold">Data Siswa</h2>
                    </div>
                    <div class="bg-gray-100 text-right py-2 px-4">
                        <a href="/" class="text-gray-600 hover:underline text-sm font-semibold">Read more</a>
                    </div>
                </div>
                {{-- <x-card.card>
                </x-card.card> --}}
            </div>
        </div>
    </div>
    admin dashoard
@endsection
