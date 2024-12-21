@extends('Layout.WebsiteLayout')

@section('Content')
    <div class="mt-[47px] px-[35px]">
        <div class="flex flex-row items-end gap-x-[21px] mb-[25px]">
            <p class="text-[23px] font-semibold">Lobi News!</p>
            <div class="mb-[8px] w-[788px] h-[1.5px] bg-black rounded-full"></div>
        </div>
        <div class="w-full flex flex-row justify-end gap-x-[31px] relative">
            <div class="flex flex-col grow">
                <div class="flex flex-row gap-x-[10px] mb-[23px]">
                    <a href="{{ route('Website.Prestasi.Index') }}">
                        <div class="w-fit h-fit px-[27px] py-[4px] rounded-[3px] bg-[#611AEE]">
                            <p class="text-[12px] text-white font-medium">All</p>
                        </div>
                    </a>
                    <a href="{{ route('Website.Prestasi.Index', "ListBy=Internasional") }}">
                        <div class="w-fit h-fit px-[27px] py-[4px] rounded-[3px] bg-[#1A6FEE]">
                            <p class="text-[12px] text-white font-medium">Internasional</p>
                        </div>
                    </a>
                    <a href="{{ route('Website.Prestasi.Index', "ListBy=Lokal") }}">
                        <div class="w-fit h-fit px-[27px] py-[4px] rounded-[3px] bg-[#A1DF3E]">
                            <p class="text-[12px] text-white font-medium">Lokal</p>
                        </div>
                    </a>
                    <a href="{{ route('Website.Prestasi.Index', "ListBy=Team") }}">
                        <div class="w-fit h-fit px-[27px] py-[4px] rounded-[3px] bg-[#E2B916]">
                            <p class="text-[12px] text-white font-medium">Team Category</p>
                        </div>
                    </a>
                    <a href="{{ route('Website.Prestasi.Index', "ListBy=Individu") }}">
                        <div class="w-fit h-fit px-[27px] py-[4px] rounded-[3px] bg-[#F1780D]">
                            <p class="text-[12px] text-white font-medium">Individual Category</p>
                        </div>
                    </a>
                </div>
                <div class="flex flex-col w-[918px] gap-y-5">
                    @foreach ($Datas as $Data)
                    <div class="w-full h-[183px] rounded-[3px] bg-white border border-gray-200 shadow-lg hover:scale-[1.02] duration-200 ease-in cursor-pointer">
                        <div class="flex flex-row items-center h-full w-full pl-[15px] pr-[40px] gap-x-[30px]">
                            <div class="w-[210px] h-[161px] overflow-hidden rounded">
                                <img class="w-full h-full" src="storage{{ $Data->Prestasi->foto_bukti_prestasi }}">
                            </div>
                            <div class="-mt-[15px]">
                                <p class="text-[20px] font-semibold">{{ $Data->Prestasi->nama_perlombaan }}</p>
                                <p class="-mt-[5px] mb-[14px] text-[12px] font-medium text-[#3C3C3C]">{{ $Data->Prestasi->nama_perlombaan }} (Internasional)</p>
                                <p class="text-[11px] italic mb-[24px]">“Kampus Poliwangi Telah Meraih total 1 juara dalam perlombaan Lomba Silat Se-Jawa Timur tingkat {{ $Data->Prestasi->Tingkatan->tingkatan }} pada tanggal {{ $Data->Prestasi->tanggal_perlombaan }}”</p>
                                <p class="text-[10px] font-medium text-[#424242]">Diposting pada 15-03-2024 24:00:13</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="w-[358px] h-[439px] bg-white border border-gray-200 shadow-lg fixed">
                <p class="text-[18px] font-semibold mt-[17px] mx-[26px]">List Mahasiswa Berprestasi</p>
                <div class="flex flex-col mt-[10px] mx-[15px] gap-y-[5px]">
                    @foreach ($BestMahasiswa as $Data)
                    <div class="flex flex-row gap-x-[11px] items-center px-[10px] py-[10px] hover:bg-slate-200">
                        <div class="w-[38px] h-[38px] rounded-full bg-black overflow-hidden">
                            <img class="w-full h-full" src="storage{{ $Data->foto_mahasiswa }}">
                        </div>
                        <div>
                            <p class="text-[13px] font-medium -mb-[3px]">{{ $Data->nama_mahasiswa }}</p>
                            <p class="text-[11px]">Telah Meraih {{ $Data->mahasiswa_prestasi_count }} Kejuaraan</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
