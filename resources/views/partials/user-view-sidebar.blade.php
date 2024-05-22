<div class="flex flex-col basis-[15%] h-screen overflow-hidden bg-slate-800 p-5 justify-between">
    <div class="flex flex-col gap-16">
        <img src="{{ asset('assets/img/logo-transparent.png') }}" alt="logo INVY">
        {{-- <h1 class="text-3xl text-teal-500 font-bold text-center">INVY<span class="text-white">.</span></h1> --}}
        <div class="flex flex-col text-slate-200 text-sm font-medium gap-4">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 transition ease-in-out duration-200 hover:text-teal-500" id="link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hidden" id="icon">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                </svg> 
                Dahsboard</a>
            <div class="border-[1px] border-slate-600"></div>
            <a href="{{ route('pembelian.index') }}" class="flex items-center gap-2 transition ease-in-out duration-200 hover:text-teal-500" id="link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hidden" id="icon">
                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                    <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
                Data Pembelian</a>
            @if(Auth::user()->hasRole('operator'))
                <a href="" class="flex items-center gap-2 transition ease-in-out duration-200 hover:text-teal-500" id="link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 hidden" id="icon">
                        <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                        <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                    Data Pemakaian</a>
            @endif
        </div>
    </div>
    <div class="flex gap-3">
        <img src="{{ asset('assets/img/profile.png') }}" alt="profile" class="w-[50px]">
        <div class="flex flex-col text-sm text-slate-300 opacity-70 justify-center">
            <p>admin</p>
            <p>admin@mail.com</p>
        </div>
    </div>
</div>