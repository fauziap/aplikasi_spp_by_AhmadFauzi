@extends('layouts.pdf')

@section('content')
    <div class="overflow-x-auto ">
        <table class=" w-full table-auto" id="myTable">
            <thead class="border-b-2 rounded-t-6  border-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        No
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Nama Kelas
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Jurusan
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y rounded-xl divide-gray-200">
                @foreach ($datas as $data)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}.
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->kelas }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->jurusan }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
