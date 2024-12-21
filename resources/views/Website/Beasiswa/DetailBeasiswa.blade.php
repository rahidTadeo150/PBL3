@extends('Layout.WebsiteLayout')

@section('Content')
    {{-- <div class="fixed w-10">
        <div class="relative w-[348px] h-[641px] overflow-hidden">
            <div class="absolute w-full h-full bg-black opacity-35"></div>
            <img class="scale-150 blur-[2px] w-full h-full object-cover" src="\storage{{ $Data->foto_beasiswa }}">
        </div>
    </div> --}}
    <div
        class="container relative grid-cols-1 gap-4 p-5 px-8 mx-auto lg:gap-10 lg:grid lg:grid-cols-2 lg:items-start lg:justify-start ">
        <div class="rounded-[10px] overflow-hidden">
            <img class="object-cover w-full h-full" src="\storage{{ $Data->foto_beasiswa }}">
        </div>
        <div class="mt-4">
            <div class="w-fit text-[13px] text-white font-medium py-[2px] px-[25px] bg-[#2F39FF] rounded-full mb-[10px]">
                <p>{{ $Data->Tingkatan->tingkatan }}</p>
            </div>
            <p class="text-[28px] font-bold mb-[14px]">{{ $Data->nama_beasiswa }}</p>
            <div class="flex flex-row gap-x-[15px] items-center mb-[20px]">
                <div class="w-[45px] h-[45px] rounded-full overflow-hidden">
                    <img src="\storage{{ $Data->Instansi->foto_profile }}">
                </div>
                <div class="text-[12px]">
                    <p class="font-medium">{{ $Data->Instansi->nama_instansi }}</p>
                    <p class="font-normal">{{ $Data->Instansi->email }}</p>
                </div>
            </div>
            <div class="w-[750px] text-[12px] line-clamp-4 mb-[28px] min-h-[72px]">
                <p>"{{ $Data->persyaratan }}"</p>
            </div>
            <div class="flex flex-row items-center gap-x-[50px] text-[#1D1D1D] mb-[30px]">
                <div class="flex flex-col gap-y-1 text-[12px] font-medium">
                    <p>Category</p>
                    <p>Instansi Penyelenggara</p>
                    <p>Contact Instansi</p>
                    <p>Pendaftaran Dibuka</p>
                    <p>Pendaftaran Ditutup</p>
                </div>
                <div class="flex flex-col gap-y-1 text-[12px]">
                    <p>: Beasiswa ({{ $Data->Tingkatan->tingkatan }})</p>
                    <p>: {{ $Data->Instansi->nama_instansi }}</p>
                    <p>: {{ $Data->Instansi->email }}</p>
                    <p>: {{ $Data->tanggal_pendaftaran }}</p>
                    <p>: {{ $Data->tanggal_penutupan }}</p>
                </div>
            </div>
            <div>
                <div class="flex flex-row items-center gap-x-2 mb-[11px]">
                    <i class="w-[16px] h-[16px] text-[#0022FF]" data-feather="link"></i>
                    <p class="text-[13px] font-semibold">Link Register Beasiswa</p>
                </div>
                <div class="flex flex-row items-center gap-x-[14px]">
                    <div class="w-[449px] py-[6px] pl-[16px] rounded-[3px] bg-[#EAEAEA]">
                        <a id="linkToCopy" class="text-[11px] text-[#2851F5] italic line-clamp-1 w-full hover:underline"
                            href="{{ $Data->link_pendaftaran }}">{{ $Data->link_pendaftaran }}</a>
                    </div>
                    <button onclick="CopyLink()"
                        class="flex flex-row items-center bg-[#3D63FF] rounded-[3px] py-[5px] px-[19px] gap-x-[6px]">
                        <i class="w-[17px] h-[17px] text-white" data-feather="copy"></i>
                        <p class="text-[10px] text-white font-medium">Copy Link</p>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="fixed z-20 w-[362px] h-[437px] top-[128px] left-[126px] bg-black rounded-[10px]">
        <img class="w-full h-full" src="\storage{{ $Data->foto_beasiswa }}">
    </div> --}}
    <script src="\JavascriptDevelp\CopyLink.js"></script>
@endsection
