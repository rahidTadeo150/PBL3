@extends('Layout.WebsiteLayout')

@section('Content')
    <div class="container mx-auto">
        <div class="px-4 mt-12 md:px-8 lg:px-10">
            <div class="flex flex-col items-end gap-4 mb-6 md:flex-row">
                <p class="text-xl font-semibold">Lobi News!</p>
                <div class="mb-2 flex-grow h-[1.5px] bg-black rounded-full"></div>
            </div>
            <div class="flex flex-col justify-between w-full gap-4 md:flex-row">
                <div class="flex flex-col grow">
                    <div class="flex flex-row flex-wrap gap-2 mb-6 ">
                        <a href="{{ route('Website.Prestasi.Index') }}">
                            <div class="w-fit h-fit px-4 py-2 rounded bg-[#611AEE]">
                                <p class="text-xs font-medium text-white">All</p>
                            </div>
                        </a>
                        <a href="{{ route('Website.Prestasi.Index', 'ListBy=Internasional') }}">
                            <div class="w-fit h-fit px-4 py-2 rounded bg-[#1A6FEE]">
                                <p class="text-xs font-medium text-white">Internasional</p>
                            </div>
                        </a>
                        <a href="{{ route('Website.Prestasi.Index', 'ListBy=Lokal') }}">
                            <div class="w-fit h-fit px-4 py-2 rounded bg-[#A1DF3E]">
                                <p class="text-xs font-medium text-white">Lokal</p>
                            </div>
                        </a>
                        <a href="{{ route('Website.Prestasi.Index', 'ListBy=Team') }}">
                            <div class="w-fit h-fit px-4 py-2 rounded bg-[#E2B916]">
                                <p class="text-xs font-medium text-white">Team Category</p>
                            </div>
                        </a>
                        <a href="{{ route('Website.Prestasi.Index', 'ListBy=Individu') }}">
                            <div class="w-fit h-fit px-4 py-2 rounded bg-[#F1780D]">
                                <p class="text-xs font-medium text-white">Individual Category</p>
                            </div>
                        </a>
                    </div>
                    <div class="flex flex-col gap-y-5">
                        @foreach ($Datas as $Data)
                            <div
                                class="w-full h-[183px] rounded bg-white border border-gray-200 shadow-lg hover:scale-105 duration-200 ease-in cursor-pointer">
                                <div class="flex flex-row items-center w-full h-full p-4 gap-x-4">
                                    <div class="w-[210px] h-[161px] overflow-hidden rounded">
                                        <img class="object-cover w-full h-full"
                                            src="storage/{{ $Data->Prestasi->foto_bukti_prestasi }}">
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold">{{ $Data->Prestasi->nama_perlombaan }}</p>
                                        <p class="text-xs font-medium text-[#3C3C3C] mb-2">
                                            {{ $Data->Prestasi->nama_perlombaan }} (Internasional)
                                        </p>
                                        <p class="mb-4 text-xs italic">“Kampus Poliwangi Telah Meraih total 1 juara
                                            dalam perlombaan Lomba Silat Se-Jawa Timur tingkat
                                            {{ $Data->Prestasi->Tingkatan->tingkatan }} pada tanggal
                                            {{ $Data->Prestasi->tanggal_perlombaan }}”</p>
                                        <p class="text-xs font-medium text-[#424242]">Diposting pada 15-03-2024 24:00:13
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full md:w-[358px] h-fit  border border-gray-200 shadow-lg">
                    <p class="mx-4 mt-4 text-lg font-semibold">List Mahasiswa Berprestasi</p>
                    <div class="flex flex-col mx-4 mt-2 gap-y-2">
                        @foreach ($BestMahasiswa as $Data)
                            <div class="flex flex-row items-center gap-2 px-2 py-2 hover:bg-slate-200">
                                <div class="w-[38px] h-[38px] rounded-full bg-black overflow-hidden">
                                    <img class="object-cover w-full h-full" src="storage/{{ $Data->foto_mahasiswa }}">
                                </div>
                                <div>
                                    <p class="-mb-1 text-sm font-medium">{{ $Data->nama_mahasiswa }}</p>
                                    <p class="text-xs">Telah Meraih {{ $Data->mahasiswa_prestasi_count }} Kejuaraan</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
