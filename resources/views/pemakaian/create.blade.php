<x-app-layout>
    @section('title', '- Tambah Data Pembelian')

    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <a href="{{ route('pembelian.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
            {{ __('Tambah Data Pembelian') }}
        </h2>
    </x-slot>


    <div class="bg-white dark:bg-gray-800 flex flex-col w-full h-full rounded-md shadow-md p-6 gap-3">
        <form action="{{ route('pembelian.store') }}" enctype="multipart/form-data" class="max-w-md flex flex-col justify-between h-full" method="POST">
            @csrf
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Kode Barang</label>
                    <select name="id_barang" id="id_barang" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none">
                        <option disabled selected>Pilih Barang</option> 
                        @forelse ($barang as $item)    
                            <option value="{{ $item->id_barang }}">{{ $item->id_barang }} | {{ $item->nama_barang }}</option>
                        @empty
                            <option value="belum_ada_data">Belum ada data barang</option>
                        @endforelse
                    </select>
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Nama Barang</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="nama_barang" id="nama_barang" required>
                    @error('nama_barang')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Jenis Barang</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="jenis_barang" id="jenis_barang" required>
                    @error('jenis_barang')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Merek</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="merek" id="merek" required>
                    @error('merek')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">harga</label>
                    <input type="number" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="harga" id="harga" required>
                    @error('harga')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Jumlah</label>
                    <input type="number" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="jumlah" required>
                    @error('jumlah')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-3 items-center dark:text-white">
                <button type="submit" class="bg-blue-500 px-4 py-1 rounded-md text-white transition hover:opacity-80">Submit</button>
                <a href="{{ route('pembelian.index') }}">Cancel</a>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const barangData = @json($barang);

            document.getElementById('id_barang').addEventListener('change', function () {
                const selectedId = this.value;
                const selectedBarang = barangData.find(barang => barang.id_barang == selectedId);

                if (selectedBarang) {
                    document.getElementById('nama_barang').value = selectedBarang.nama_barang;
                    document.getElementById('jenis_barang').value = selectedBarang.jenis_barang;
                    document.getElementById('merek').value = selectedBarang.merek;
                    // If jumlah and harga are pre-filled, uncomment the lines below
                    // document.getElementById('jumlah').value = selectedBarang.jumlah;
                    document.getElementById('harga').value = selectedBarang.harga;
                } else {
                    document.getElementById('nama_barang').value = '';
                    document.getElementById('jenis_barang').value = '';
                    document.getElementById('merek').value = '';
                    // If jumlah and harga are pre-filled, uncomment the lines below
                    // document.getElementById('jumlah').value = '';
                    document.getElementById('harga').value = '';
                }
            });
        });
    </script>
</x-app-layout>