<x-app-layout>
    @section('title', '- Dashboard')
    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-rows-3 gap-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8 row-span-1">
                <div class="bg-slate-800 flex gap-3 text-white p-6 rounded-md justify-between">
                    <p class="text-xl font-semibold">Wellcome back {{ Auth::user()->name }}!</p>
                    <img src="{{ asset('assets/img/Pie-chart.gif') }}" alt="chart" class="w-[100px]">
                </div>
            </div>
            <div class="col-span-4 bg-gray-300 rounded-md">
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4">
                <a href="{{ route('barang.index') }}" class="bg-white dark:bg-gray-700 dark:text-white text-black pl-8 pr-4 py-6 flex items-center transition hover:scale-105 rounded-md gap-3 hover:translate-x-1 hover:translate-y-1 hover:shadow-md hover:bg-gradient-to-tr hover:from-teal-500 hover:to-teal-200 hover:!text-white col-span-3">
                    <div class="flex flex-col text-right font-semibold">
                        <p class="text-lg">Data Barang</p>
                        <p class="font-bold text-2xl">{{ $barang->count() }}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 opacity-70">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </a>
                <a href="{{ route('pembelian.index') }}" class="bg-white dark:bg-gray-700 dark:text-white text-black pl-8 pr-4 py-6 flex items-center transition hover:scale-105 rounded-md gap-3 hover:translate-x-1 hover:translate-y-1 hover:shadow-md hover:bg-gradient-to-tr hover:from-teal-500 hover:to-teal-200 hover:!text-white col-span-3">
                    <div class="flex flex-col text-right font-semibold">
                        <p class="text-lg">Data Pembelian</p>
                        <p class="font-bold text-2xl">9999</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 opacity-70">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </a>
                <a href="" class="bg-white dark:bg-gray-700 dark:text-white text-black pl-8 pr-4 py-6 flex items-center transition hover:scale-105 rounded-md gap-3 hover:translate-x-1 hover:translate-y-1 hover:shadow-md hover:bg-gradient-to-tr hover:from-teal-500 hover:to-teal-200 hover:!text-white col-span-3">
                    <div class="flex flex-col text-right font-semibold">
                        <p class="text-lg">Data Pemakaian</p>
                        <p class="font-bold text-2xl">9999</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 opacity-70">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </a>
                <a href="" class="bg-white dark:bg-gray-700 dark:text-white text-black pl-8 pr-4 py-6 flex items-center transition hover:scale-105 rounded-md gap-3 hover:translate-x-1 hover:translate-y-1 hover:shadow-md hover:bg-gradient-to-tr hover:from-teal-500 hover:to-teal-200 hover:!text-white col-span-3">
                    <div class="flex flex-col text-right font-semibold">
                        <p class="text-lg">Data Pembelian</p>
                        <p class="font-bold text-2xl">9999</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 opacity-70">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </a>
        </div>
        <div class="gird grid-cols-12 gap-4">
            <div class="col-span-7 bg-white">

            </div>
        </div>
    </div>
</x-app-layout>