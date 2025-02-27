@extends('Layout.AdminLayout')

@section('Content')
    @if (Session('Success'))
    @include('Modal.SuccessModalCRUD')
    @endif
    <div class="flex flex-row justify-between">
        <div class="w-screen">
            <p class="text-[28px] font-bold">Mail Request Notification</p>
            <div class="flex flex-row gap-x-3 mt-[21px] mb-[33px]">
                <button class="px-[50px] py-[5px] bg-[#3052CC] rounded-[3px] text-[13px] text-white font-medium">Belum Terbaca</button>
                <button class="px-[50px] py-[5px] border-2 border-[#3052CC] rounded-[3px] text-[13px] text-[#3052CC] font-medium">Sudah Terbaca</button>
            </div>
            @if (!empty($RequestUnread[0]))
            @foreach ($RequestUnread as $Data)
            <a href="{{ route('Dashboard.Notification.Detail', "IdRequest=$Data->id") }}">
                <div class="relative bg-white w-full h-[136px] shadow-lg rounded-[5px] px-[20px] hover:-translate-y-2 ease-in duration-100">
                    <div class="flex flex-row items-center w-full h-full gap-x-6">
                        <div class="w-[75px] h-[75px] rounded-full overflow-hidden">
                            <img src="\storage\{{ $Data->Mahasiswa->foto_mahasiswa }}" class="w-full h-full">
                        </div>
                        <div>
                            <p class="text-[17px] font-semibold leading-4">{{ $Data->Mahasiswa->nama_mahasiswa }}</p>
                            <p class="text-[10px] font-medium italic">Mahasiswa</p>
                            <p class="text-[10px] font-medium w-[565px] mt-[9px]">{{ $Data->Mahasiswa->nama_mahasiswa }} Ingin mengajukan prestasi {{ $Data->nama_perlombaan }} ke lobi poliwangi, untuk detail selengkapnya silahkan click pesan ini</p>
                            <p class="text-[10px] mt-[9px]">Dikirim Pada {{ $Data->created_at }}</p>
                        </div>
                    </div>
                    <div class="absolute w-[15px] h-[15px] bg-[#4370C8] rounded-full top-2 right-2"></div>
                </div>
            </a>
            @endforeach
            @else
            <div class="flex flex-col justify-center items-center w-[718px] h-full">
                <p>Tidak Ada Notifikasi</p>
            </div>
            @endif
        </div>
        {{-- <div class="flex flex-col gap-y-3">
            <div class="w-[275px] h-[41px] rounded-md bg-gradient-to-r from-[#6889FF] to-[#8F31B0] flex flex-col justify-center items-center">
                <p class="text-white text-[13px] font-semibold">Category Message</p>
            </div>
            <button class="hover:scale-105 ease-in duration-100 px-[7px] flex flex-col justify-center w-[275px] h-[41px] rounded-md bg-[#E0E0EB]">
                <div class="flex flex-row items-center justify-between w-full h-full">
                    <div class="flex flex-row items-center gap-x-2">
                        <img class="w-[28px] h-[28px]" src="\webdevelp\icons\IconRequestBeasiswaActive.png">
                        <p class="text-black text-[13px]">Request Beasiswa</p>
                    </div>
                    <img class="w-[15px] h-[15px] hidden" src="\webdevelp\icons\ChecklistActiveIcon.png">
                </div>
            </button>
            <button class="hover:scale-105 px-[7px] flex flex-col justify-center w-[275px] h-[41px] rounded-md bg-[#E0E0EB]">
                <div class="flex flex-row items-center justify-between w-full h-full">
                    <div class="flex flex-row items-center gap-x-2">
                        <img class="w-[28px] h-[28px]" src="\webdevelp\icons\IconRequestLomba.png">
                        <p class="text-black text-[13px]">Request Lomba</p>
                    </div>
                    <img class="w-[15px] h-[15px] hidden" src="\webdevelp\icons\ChecklistActiveIcon.png">
                </div>
            </button>
            <button class="hover:scale-105 px-[7px] flex flex-col justify-center w-[275px] h-[41px] rounded-md bg-[#E0E0EB]">
                <div class="flex flex-row items-center justify-between w-full h-full">
                    <div class="flex flex-row items-center gap-x-2">
                        <img class="w-[28px] h-[28px]" src="\webdevelp\icons\IconRequestPrestasi.png">
                        <p class="text-[#426BFF] text-[13px]">Request Prestasi</p>
                    </div>
                    <img class="w-[15px] h-[15px]" src="\webdevelp\icons\ChecklistActiveIcon.png">
                </div>
            </button>
        </div> --}}
    </div>
    <script src="\JavascriptDevelp\CloseModal.js"></script>
@endsection
