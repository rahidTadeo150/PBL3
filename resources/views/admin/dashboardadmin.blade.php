@extends('Layout.AdminLayout')

@section('Content')
    <div class="grid grid-cols-1 gap-4 mt-6 lg:grid-cols-3 ">
        <div
            class=" h-[243px] shadow-xl px-6 flex lg:col-span-2 flex-row justify-between bg-gradient-to-br from-[#6889FF] to-[#8F31B0] rounded-lg">
            <div class="py-5 text-white">
                <p class="text-[27px] font-semibold">Selamat Datang Kembali</p>
                <p class="font-medium">Admin Lobi Poliwangi</p>
                <p class="mt-10 text-xs italic font-light">Count Data Saat ini</p>
                <p class="font-extrabold text-[54px] -mt-3">101</p>
            </div>
            <div class="justify-end hidden h-full md:flex">
                <img src="\webdevelp\robots.png" class="w-full h-auto">
            </div>
        </div>
        <div class=" h-[243px] bg-white rounded-lg shadow-xl">
            <p>test</p>
        </div>
    </div>
    <div class="flex flex-row items-center justify-between mt-12 ">
        <p class="text-xl font-semibold">Recently Added</p>
        <a href="{{ route('Beasiswa.Index') }}"
            class="text-base transition ease-in-out text-315BC9 hover:border-315BC9 hover:font-medium hover:-translate-x-3">View
            all <span></span></a>
    </div>
    <div class="flex flex-row px-2 mt-8 overflow-x-auto gap-x-10">
        @foreach ($RecentNew as $Data)
            <div class="w-[250px] h-fit pb-[16px] bg-white shadow-xl rounded-md overflow-hidden flex-shrink-0">
                <div class="w-full h-[252px] overflow-hidden">
                    <img src="storage/{{ $Data->foto }}" class="object-cover w-full h-full">
                </div>
                <div class="px-[11px] py-[5px]">
                    <p class="text-[18px] font-bold w-full truncate">{{ $Data->nama_event }} </p>
                    <p class="-mt-1 text-[12px]">{{ $Data->Instansi->nama_instansi }}</p>
                    <div class="flex flex-row gap-x-1 mt-[21px] items-center">
                        <img class="w-[20px] h-fit" src="\webdevelp\icons\CalendarIcon.png">
                        <p class="text-[12px]"> <span>{{ $Data->tanggal_pendaftaran }}</span> s.d
                            <span>{{ $Data->tanggal_penutupan }}</span>
                        </p>
                    </div>
                    <a href="{{ route($Data->Routing, "id=$Data->id") }}">
                        <button
                            class="mt-[8px] w-full rounded-[3px] py-[7px] text-white font-medium hover:font-semibold text-[13px] bg-[#3052CC]">
                            Detail Event
                        </button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex flex-row justify-between w-full ">
        <div class="w-full">
            <p class="text-xl font-semibold mb-[16px] mt-5">Terakhir Di Nonaktifkan</p>
            <div class="grid flex-row justify-between w-full grid-cols-3 gap-4">
                <div class="flex flex-col col-span-3 lg:col-span-2 gap-y-4">
                    @if (!empty($Nonaktif[0]))
                        @foreach ($Nonaktif as $Data)
                            <div class=" h-[130px] bg-white min-w-72 pl-[9px] rounded-md overflow-hidden group">
                                <div class="flex flex-row items-center justify-between w-full h-full">
                                    <div class="flex flex-row items-center h-full gap-x-3">
                                        <div class="w-[116px] h-[116px] overflow-hidden my-[7px]">
                                            <img src="storage/{{ $Data->foto }}" class="w-full h-full">
                                        </div>
                                        <div class="py-1.5 flex flex-col justify-start h-full my-[7px]">
                                            <p class="font-semibold text-[18px]">{{ $Data->nama_event }}</p>
                                            <div class="flex flex-row items-center justify-start">
                                                <img src="\webdevelp\icons\InstansiIcon-Mini.png">
                                                <p class="font-medium text-[10px] text-slate-800">
                                                    {{ $Data->instansi->nama_instansi }}
                                                </p>
                                            </div>
                                            <p class="text-[10px] truncate w-full mt-[20px]">{{ $Data->persyaratan }}</p>
                                            <div class="mt-[10px] flex flex-row items-center">
                                                <img class="w-[20px] h-[20px]" src="\webdevelp\icons\ExpiredDateIcon.png">
                                                <p class="-mb-0.5 font-medium text-[#B00101] text-[10px]">12-09-2024 <span
                                                        class="italic">(telah Terlewat)</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/detail-event"
                                        class="flex flex-col justify-center items-center w-[120px] h-full bg-[#315BC9] overflow-hidden ease-in duration-200 font-semibold group-hover:-translate-x-0 translate-x-[120px]">
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
                <div
                    class="hidden overflow-y-auto lg:block relative px-[12px] py-[16px]  h-[468px] bg-white shadow-xl rounded-[10px]">
                    <p class="px-[14px] text-[21px] font-semibold mb-[19px]">Request Mail</p>
                    <div class=" h-[64px] hover:bg-gray-300 rounded-[6px]">
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
                        <button
                            class="text-[#3052CC] hover:bg-[#3052CC] hover:text-white text-[13px] font-semibold absolute bottom-5 right-5 left-5 border-2 border-[#3052CC] px-[80px] py-[7px] rounded-[3px]">
                            Check Mail Request
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
