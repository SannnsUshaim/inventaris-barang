<x-app-layout>
    @section('title', '- Tambah Data Barang')

    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <a href="{{ route('barang.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
            {{ __('Tambah Data Barang') }}
        </h2>
    </x-slot>


    <div class="bg-white dark:bg-gray-800 flex flex-col w-full h-full rounded-md shadow-md p-6 gap-3">
        <form action="{{ route('barang.store') }}" enctype="multipart/form-data" class="max-w-md flex flex-col justify-between h-full" method="POST">
            @csrf
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Kode Barang</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="id_barang" required>
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Nama Barang</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="nama_barang" required>
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Jenis Barang</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="jenis_barang" required>
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Merek</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="merek" required>
                </div>
                <script>
                    function formatJumlah(input) {
                        // Hapus semua karakter selain angka
                        let value = input.value.replace(/\D/g, '');
                        // Batasi panjang nilai menjadi 18 karakter untuk memenuhi batas maksimal
                        value = value.substring(0, 18);
                        // Format ulang dengan titik setiap tiga digit
                        input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                    }

                    // Menjalankan formatJumlah saat halaman dimuat
                    document.addEventListener('DOMContentLoaded', function() {
                        const jumlahInput = document.getElementById('jumlah');
                        formatJumlah(jumlahInput);
                    });
                </script>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Jumlah</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="jumlah" id="jumlah" oninput="formatJumlah(this)" required>
                </div>
                <script>
                    function formatHarga(input) {
                        // Hapus semua karakter selain angka
                        let value = input.value.replace(/\D/g, '');
                        // Batasi panjang nilai menjadi 18 karakter untuk memenuhi batas maksimal
                        value = value.substring(0, 18);
                        // Format ulang dengan titik setiap tiga digit
                        const formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        // Tambahkan 'Rp. ' di depan nilai yang diformat
                        input.value = 'Rp. ' + formatted;
                    }

                    // Menjalankan formatHarga saat halaman dimuat
                    document.addEventListener('DOMContentLoaded', function() {
                        const hargaInput = document.getElementById('harga');
                        formatHarga(hargaInput);
                    });
                </script>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="harga">Harga (pcs)</label>
                    <input type="text" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="harga" id="harga" oninput="formatHarga(this)" required>
                </div>
            </div>
            <div class="flex gap-3 items-center dark:text-white">
                <button type="submit" class="bg-blue-500 px-4 py-1 rounded-md text-white transition hover:opacity-80">Submit</button>
                <a href="{{ route('barang.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</x-app-layout>