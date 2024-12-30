@extends('Layout.AdminLayout')

@section('Content')
    <div class="relative -ml-4 -mr-4 overflow-hidden  h-96">
        <img class=" h-80 absolute shadow-xl border border-gray-700 z-20 rounded-md -translate-y-[50%] -translate-x-[50%] top-[50%] left-[50%]" src="storage/{{ $Data->foto_lomba }}">
        <div class="absolute z-10 w-full h-full bg-black opacity-40"></div>
        <div class="w-full overflow-hidden">
            <img class="z-0 w-full bg-contain -translate-y-1/4 blur-sm" src="/storage/{{ $Data->foto_lomba }}">
        </div>
    </div>
    <div class="flex flex-row justify-between w-full mt-8">
        <div class="w-[350px] bg-white shadow-lg border border-gray-300 border-l-4 border-l-[#315BC9] pt-8 pb-14 px-6 rounded-md">
            <div>
                <p class="mb-2 text-3xl font-bold">{{ $Data->nama_perlombaan }}</p>
                <p class="w-fit h-fit p-1.5 pl-4 pr-4 bg-[#315BC9] rounded-lg text-sm text-slate-100 font-medium">{{ $Data->Instansi->nama_instansi }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Status Saat Ini</p>
                <p class="text-sm font-semibold text-emerald-700">
                    <span class="mr-2"><i class="fa-solid fa-circle-check"></i></span>{{ $Data->Status->status }}
                </p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Tanggal Pembukaan Register</p>
                <p class="text-sm font-semibold"><span class="mr-2"><i class="fa-regular fa-calendar"></i></span>{{ $Data->tanggal_pendaftaran }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Tanggal Penutupan Register</p>
                <p class="text-sm font-semibold"><span class="mr-2"><i class="fa-regular fa-calendar"></i></span>{{ $Data->tanggal_penutupan }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Tingkatan Lomba</p>
                <p class="text-sm font-semibold"><span class="mr-2"><i class="fa-solid fa-earth-americas"></i></span>{{ $Data->Tingkatan->tingkatan }}</p>
            </div>
        </div>
        <div class="w-[650px] bg-white shadow-lg border border-gray-300 border-l-4 border-l-[#315BC9] rounded-md p-6">
            <div class="">
                <p class="mb-2 text-base font-semibold">Persyaratan Lomba</p>
                <div class="w-full h-[100px] py-2 px-3 bg-gray-200 rounded-md overflow-y-scroll">
                    <p class="text-sm font-normal">{{ $Data->persyaratan }}</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="mb-2 text-base font-semibold">Link Pendaftaran Lomba</p>
                <div class="w-full px-3 py-2 bg-gray-200 rounded-md">
                    <a href="{{ $Data->link_pendaftaran }}" target="_blank" rel="noopener noreferrer">
                        <p class="text-sm font-normal text-blue-600 hover:underline"><span class="mr-2 text-black"><i class="fa-solid fa-link"></i></span>{{ $Data->link_pendaftaran }}</p>
                    </a>
                </div>
            </div>
            <p class="mt-5 mb-2 text-base font-semibold">Di Buat Atau Di Edit Oleh</p>
            <div class="flex flex-row items-center">
                <div class="w-12 h-12 overflow-hidden rounded-full">
                    <img src="DefaultDatas\BeasiswaInstansi\DefaultProfiles.jpg" class="w-full h-full">
                </div>
                <div class="-mt-1">
                    <p class="ml-2 text-sm font-medium">{{ $Data->Admin->username }}</p>
                    <p class="ml-2 text-xs font-normal">Pada {{ $Data->created_at }}</p>
                </div>
            </div>
            <div class="flex flex-row w-full mt-10">
                <a href="/edit-data-lomba?IdObject={{ $Data->id }}&IdInstansi={{ $Data->Instansi->id }}">
                    <button class="p-3 mr-4 text-sm text-gray-100 bg-yellow-500 rounded cursor-pointer w-fit h-fit" type="submit"><span class="mr-2"><i class="fa-solid fa-pen-to-square"></i></span>Edit Data Ini</button>
                </a>
                <form action="/delete-data-lomba" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="IdLomba" value="{{ $Data->id }}">
                    <button class="p-3 text-sm text-gray-200 bg-red-600 rounded cursor-pointer w-fit h-fit hover:bg-red-500"type="submit"><span class="mr-2"><i class="fa-solid fa-trash"></i></span>Nonaktifkan Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
