<x-app-layout>
    @section('title', '- Tambah Data Pembelian')

    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            <a href="{{ route('user.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
            {{ __('Ubah Data user') }}
        </h2>
    </x-slot>


    <div class="bg-white dark:bg-gray-800 flex flex-col w-full h-full rounded-md shadow-md p-6 gap-3">
        <form action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" class="max-w-md flex flex-col justify-between h-full" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">ID User</label>
                    <input type="text" name="id_user" id="id_user" value="{{ old('id_user', $user->id_user) }}" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" readonly>
                    @error('id_user')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    <label class="text-sm" for="id_barang">E-mail</label>
                    <input type="email" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 dark:text-white">
                    @php
                        $userRoles = $user->getRoleNames(); // Mengambil role dari user menggunakan Spatie
                    @endphp
                    <div class="flex flex-col gap-2 dark:text-white">
                        <label class="text-sm" for="role">Role</label>
                        <select name="role" id="role" class="px-2 py-1 !text-black text-base font-medium rounded-lg border-[1.7px] border-gray-300 shadow-sm focus:outline-none">
                            <option disabled {{ $userRoles->isEmpty() ? 'selected' : '' }}>Pilih Role</option>
                            <option value="admin" {{ $userRoles->contains('admin') ? 'selected' : '' }}>Admin</option>
                            <option value="operator" {{ $userRoles->contains('operator') ? 'selected' : '' }}>Operator</option>
                            <option value="staff" {{ $userRoles->contains('staff') ? 'selected' : '' }}>Staff</option>
                        </select>
                    </div>
                    @error('role')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-3 items-center dark:text-white">
                <button type="submit" class="bg-blue-500 px-4 py-1 rounded-md text-white transition hover:opacity-80">Submit</button>
                <a href="{{ route('user.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>