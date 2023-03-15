<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div>
        <div class="py-8 ">
            <h2 class="text-2xl font-bold mb-5 leading-7 text-gray-900 sm:text-3xl sm:truncate">
                History Pembayaran
            </h2>
            <div class=" my-5 mt-10 flex ">
                    <div>
                        <a href="{{ url('history/export') }}"
                            class="bg-green-700 mt-3 hover:bg-green-800 text-white py-1 px-3 mr-2 rounded-lg ">
                            <i class="fas fa-file-excel text-sm"></i> Excel
                        </a>
                        <a href="{{ url('history/pdf') }}"
                            class="bg-red-600 mt-3 hover:bg-red-700 text-white py-1 px-3 mr-5 rounded-lg ">
                            <i class="fas fa-file-pdf text-sm"></i> Pdf
                        </a>
                    </div>
            </div>
            <div class="overflow-x-auto ">
                <table class=" w-full table-auto">
                    <thead class="border-b-2 rounded-t-6  border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                Petugas
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                Siswa
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                Nominal
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-bold text-gray-600 uppercase tracking-wider">
                                Jumlah
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
                                    {{ $data->petugas->nama }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $data->siswa->nama }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $data->tgl_bayar }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    Rp. {{ number_format($data->spp->nominal) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    Rp. {{ number_format($data->jmlh_bayar) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
