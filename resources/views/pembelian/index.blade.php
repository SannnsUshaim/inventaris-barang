<x-app-layout>
    @section('title', '- Data Pembelian')
    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Pembelian') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 flex flex-col w-full h-full relative rounded-md shadow-md p-6 justify-between">
            <div class="flex flex-col gap-3">
                <div class="flex">
                    <a href="{{ route('pembelian.create') }}" class="bg-teal-500 px-4 py-1 text-white font-medium text-sm rounded-md flex items-center gap-2">Tambah Data Pembelian 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>
                </div>
                @if(session()->has('success'))
                    <div class="bg-green-300 text-black font-medium text-sm px-4 py-1 rounded-md">
                        {{ session('success') }}
                    </div>
                @elseif (session()->has('success-delete')) 
                    <div class="bg-red-300 text-black font-medium text-sm px-4 py-1 rounded-md">
                        {{ session('success-delete') }}
                    </div>
                @endif
                <table class="text-sm font-medium rounded-t-md">
                    <thead class="bg-slate-800 dark:bg-white">
                        <tr class="rounded-t-md">
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">No.</th>
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">Kode Barang</th>
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">Nama Barang</th>
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">Jenis Barang</th>
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">Merek</th>
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">Jumlah</th>
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">Harga</th>
                            <th class="font-medium py-1 text-white dark:text-gray-900 text-left px-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembelian as $data)
                            <tr class="border-b-2">
                                <td class="font-regular dark:text-white p-2">{{ $loop->iteration }}</td>
                                <td class="font-regular dark:text-white p-2">{{ $data->id_barang }}</td>
                                <td class="font-regular dark:text-white p-2">{{ $data->nama_barang }}</td>
                                <td class="font-regular dark:text-white p-2">{{ $data->jenis_barang }}</td>
                                <td class="font-regular dark:text-white p-2">{{ $data->merek }}</td>
                                <td class="font-regular dark:text-white p-2">{{ number_format($data->jumlah ,0 ,',', '.') }} pcs</td>
                                <td class="font-regular dark:text-white p-2">Rp. {{ number_format($data->total ,0 ,'.', ',') }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('pembelian.destroy', $data->id) }}" class="flex items-center gap-2" method="post">
                                        <a href="{{ route('pembelian.edit', $data->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="bg-red-200 px-2 py-1 font-medium rounded-md">
                                <p>Data belum tersedia...</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-sm dark:text-white">
                <p>total data: {{ $pembelian->count() }}</p>
            </div>
        </div>
</x-app-layout>