@extends('Layout.AdminLayout')

@section('Content')
    <div class="w-full h-full py-[25px]">
        <p class="text-2xl font-semibold">Pengajuan Prestasi</p>
        <p class="text-sm font-normal text-gray-700">Detail Informasi Pengajuan Prestasi Yang Di Ajukan Mahasiswa</p>
        <div class="w-full mt-6 mb-8 border-b-2 border-b-gray-700"></div>
        <div class="flex flex-row items-center justify-between gap-x-[40px]">
            <div class="w-[400px] h-[400px] overflow-hidden">
                <img class="w-full h-full" src="storage/{{ $DataRequest->foto_bukti_prestasi }}">
            </div>
            <div class="grow">
                <div class="flex flex-row gap-x-3">
                    <div class="flex flex-col justify-center items-center px-[27px] py-[3px] bg-[#2A4BC1] rounded-full text-white text-[10px]">
                        Kategori Individu
                    </div>
                    <div class="flex flex-col justify-center items-center px-[27px] py-[3px] bg-[#D27B2B] rounded-full text-white text-[10px]">
                        Internasional
                    </div>
                </div>
                <p class="text-[30px] font-bold mt-[15px] leading-8">{{ $DataRequest->nama_perlombaan }}</p>
                <p class="text-[14px] font-medium">Bank BCA Jember</p>
                <div class="flex flex-row items-center mt-[20px] gap-x-2 mb-[30px]">
                    <img class="w-[25px] h-[25px]" src="\webdevelp\icons\IconDescRequest.png">
                    <p class="text-[15px] font-semibold tracking-tight">Detail Prestasi Mahasiswa</p>
                </div>
                <div class="flex flex-row items-center gap-x-[50px] text-[#1D1D1D] text-[11px] mb-[30px]">
                    <div class="flex flex-col font-medium gap-y-1">
                        <p>Nama Perlombaan</p>
                        <p>Kedudukan Posisi Juara</p>
                        <p>Category Lomba</p>
                        <p>Tingkatan Perlombaan</p>
                        <p>Tanggal Di Kirim</p>
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <p>: {{ $DataRequest->nama_perlombaan }}</p>
                        <p>: {{ $DataRequest->posisi_juara }}</p>
                        <p>: {{ $DataRequest->Category->category }}</p>
                        <p>: {{ $DataRequest->Tingkatan->tingkatan }}</p>
                        <p>: {{ $DataRequest->created_at }}</p>
                    </div>
                </div>
                <div class="flex w-full flex-row justify-end gap-x-8 mt-[70px]">
                    <form action="{{ route('Dashboard.AcceptRequest') }}" method="post">
                        @csrf
                        <input type="hidden" name="IdRequest" value="{{ $DataRequest->id }}">
                        <button class="px-[32px] py-[9px] bg-[#3052CC] rounded-[5px]">
                            <div class="flex flex-row items-center justify-center gap-x-2">
                                <img class="w-[15px] h-[15px]" src="\webdevelp\icons\AddDataIcon.png">
                                <p class="text-[12px] text-white">Post On Lobi Poliwangi</p>
                            </div>
                        </button>
                    </form>
                    <button class="px-[32px] py-[9px] bg-[#C80000] rounded-[5px]">
                        <div class="flex flex-row items-center justify-center gap-x-2">
                            <img class="w-[15px] h-[15px]" src="\webdevelp\icons\IconRejectSubmission.png">
                            <p class="text-[12px] text-white">Reject Submission</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
