@extends('Layout.AdminLayout')

@section('Content')
    <div class="flex flex-row justify-between">
        <div class="w-[715px] h-[243px] shadow-xl px-6 flex flex-row justify-between bg-gradient-to-br from-[#6889FF] to-[#8F31B0] rounded-lg">
            <div class="py-5 text-white">
                <p class="text-[27px] font-semibold">Selamat Datang Kembali</p>
                <p class="font-medium">Admin Lobi Poliwangi</p>
                <p class="font-light italic text-xs mt-14">Count Data Saat ini</p>
                <p class="font-extrabold text-[54px] -mt-3">101</p>
            </div>
            <div class="h-full flex justify-end">
                <img src="\webdevelp\robots.png">
            </div>
        </div>
        <div class="w-[311px] h-[243px] bg-white rounded-lg shadow-xl"></div>
    </div>
    <div class="w-[1000px] flex flex-row justify-between items-center mt-12">
        <p class="text-xl font-semibold">Recently Added</p>
        <a href="{{ route('Beasiswa.Index') }}" class="text-base text-315BC9 hover:border-315BC9 hover:font-medium hover:-translate-x-3 transition ease-in-out">View all <span></span></a>
    </div>
    <div class="mt-8 flex flex-row gap-x-10 px-2">
        @foreach ($RecentNew as $Data)
        <div class="w-[297px] h-fit pb-[16px] bg-white shadow-xl rounded-md overflow-hidden">
            <div class="w-full h-[252px] overflow-hidden">
                <img src="storage/{{ $Data->foto }}">
            </div>
            <div class="px-[11px] py-[5px]">
                <p class="text-[18px] font-bold w-full truncate">{{ $Data->nama_event }}</p>
                <p class="-mt-1 text-[12px]">{{ $Data->Instansi->nama_instansi }}</p>
                <div class="flex flex-row gap-x-1 mt-[21px] items-center">
                    <img class="w-[20px] h-fit" src="\webdevelp\icons\CalendarIcon.png">
                    <p class="text-[12px]"> <span>{{ $Data->tanggal_pendaftaran }}</span> s.d <span>{{ $Data->tanggal_penutupan }}</span></p>
                </div>
                <a href="{{ route($Data->Routing, "id=$Data->id") }}">
                    <button class="mt-[8px] w-[267.67px] rounded-[3px] py-[7px] text-white font-medium hover:font-semibold text-[13px] bg-[#3052CC]">
                        Detail Event
                    </button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex flex-row justify-between mt-10 w-full">
        <div class="w-full">
            <p class="text-xl font-semibold mb-[16px]">Terakhir Di Nonaktifkan</p>
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col gap-y-4">
                    @if(!empty($Nonaktif[0]))
                    @foreach ($Nonaktif as $Data)
                    <div class="w-[669px] h-[130px] bg-white pl-[9px] rounded-md overflow-hidden group">
                        <div class="flex flex-row justify-between items-center w-full h-full">
                            <div class="flex flex-row items-center gap-x-3 h-full">
                                <div class="w-[116px] h-[116px] overflow-hidden my-[7px]">
                                    <img src="storage/{{ $Data->foto }}" class="w-full h-full">
                                </div>
                                <div class="py-1.5 flex flex-col justify-start h-full group-hover:w-[384px] w-[400px] my-[7px]">
                                    <p class="font-semibold text-[18px]">{{ $Data->nama_event }}</p>
                                    <div class="flex flex-row items-center">
                                        <img src="\webdevelp\icons\InstansiIcon-Mini.png">
                                        <p class="font-medium text-[10px]">{{ $Data->nama_instansi }}</p>
                                    </div>
                                    <p class="text-[10px] truncate w-full mt-[20px]">{{ $Data->persyaratan }}</p>
                                    <div class="mt-[10px] flex flex-row items-center">
                                        <img class="w-[20px] h-[20px]" src="\webdevelp\icons\ExpiredDateIcon.png">
                                        <p class="-mb-0.5 font-medium text-[#B00101] text-[10px]">12-09-2024 <span class="italic">(telah Terlewat)</span></p>
                                    </div>
                                </div>
                            </div>
                            <a href="/detail-event" class="flex flex-col justify-center items-center w-[120px] h-full bg-[#315BC9] overflow-hidden ease-in duration-200 font-semibold group-hover:-translate-x-0 translate-x-[120px]">
                                <button class="text-white text-[18px]">
                                    Detail
                                </button>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="w-[650px] h-[400px] bg-white flex flex-col justify-center items-center">
                        <p class="text-[13px] font-semibold">Data Tidak Tersedia [404]</p>
                    </div>
                    @endif
                </div>
                <div class="relative px-[12px] py-[16px] w-[348px] h-[468px] bg-white shadow-xl rounded-[10px]">
                    <p class="px-[14px] text-[21px] font-semibold mb-[19px]">Request Mail</p>
                    <div class="w-[325px] h-[64px] hover:bg-gray-300 rounded-[6px]">
                        <div class="flex flex-row items-center w-full h-full gap-x-2 px-[18px] py-[12px]">
                            <div class="w-[40px] rounded-full overflow-hidden">
                                <img class="w-full h-full" src="DefaultDatas\BeasiswaInstansi\DefaultProfiles.jpg">
                            </div>
                            <div class="flex flex-col justify-center">
                                <p class="text-[13px] font-semibold">Bank BCA Jember</p>
                                <p class="text-[10px]">Ingin Mengajukan Beasiswa Ke lobi Poliwangi</p>
                            </div>
                        </div>
                    </div>
                    <a href="/notification-request">
                        <button class="text-[#3052CC] hover:bg-[#3052CC] hover:text-white text-[13px] font-semibold absolute bottom-5 right-5 left-5 border-2 border-[#3052CC] px-[80px] py-[7px] rounded-[3px]">
                            Check Mail Request
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
