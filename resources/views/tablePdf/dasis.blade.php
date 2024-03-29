@extends('layouts.pdf')

@section('content')
    <div class="overflow-x-auto ">
        <table class=" w-full table-auto">
            <thead class="border-b-2 rounded-t-6  border-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        No
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Nama
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Kelas
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Username
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Nisn
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Nis
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Alamat
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Telphone
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                        Spp
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y rounded-xl divide-gray-200">
                @foreach ($dat as $data)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}.
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->nama }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->kelas->kelas }} {{ $data->kelas->jurusan }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->nisn }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->nis }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->alamat }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $data->no_telp }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Rp. {{ number_format($data->spp->nominal) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
