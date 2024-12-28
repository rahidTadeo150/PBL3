@extends('Layout.WebsiteLayout')

@section('Content')
    @include('Website.Compnent.CarouselComponent')
    @if (!Auth::guard('Mahasiswa')->check())
        <div
            class="fixed top-0 bottom-0 left-0 right-0 z-40 flex flex-col items-center justify-center bg-black bg-opacity-80">
            <div class="p-[25px] rounded-sm bg-white flex flex-col items-end gap-y-[40px]">
                <p class="text-[16px]">Harap Melakukan Login Dahulu untuk Mengakses Halaman ini</p>
                <a href="{{ route('Login.LoginMethod') }}">
                    <div class="p-[10px] rounded-sm bg-green-600 w-fit cursor-pointer">
                        <p class="text-[14px] text-white">Mengerti</p>
                    </div>
                </a>
            </div>
        </div>
    @endif

    <div class="container px-6 mx-auto lg:px-2">
        <div class="flex flex-col justify-between gap-8 mt-12 lg:flex-row">
            <div class="flex flex-col w-full lg:w-3/4">
                <div class="flex flex-col justify-between w-full gap-4 md:flex-row">
                    <div class="flex flex-row items-center justify-evenly gap-x-6">
                        <a href="{{ route('Website.Lomba.Index') }}">
                            <div
                                class="{{ !request()->has('ListBy') ? 'ActiveTabs' : '' }} px-[20px] flex flex-col items-center">
                                <p class="text-[16px] font-medium">Terbaru</p>
                            </div>
                        </a>
                        <a href="{{ route('Website.Lomba.Index', 'ListBy=Lokal') }}">
                            <div
                                class="{{ request()->ListBy == 'Lokal' ? 'ActiveTabs' : '' }} px-[20px] flex flex-col items-center">
                                <p class="text-[16px] font-medium">Lokal</p>
                            </div>
                        </a>
                        <a href="{{ route('Website.Lomba.Index', 'ListBy=Internasional') }}">
                            <div
                                class="{{ request()->ListBy == 'Internasional' ? 'ActiveTabs' : '' }} px-[20px] flex flex-col items-center">
                                <p class="text-[16px] font-medium">Internasional</p>
                            </div>
                        </a>
                    </div>
                    <div class="w-full h-8 px-2 bg-white border-2 border-black rounded-full lg:max-w-96">
                        <div class="relative flex flex-row items-center w-full h-full py-1 gap-x-2">
                            <i class="w-4 h-4" data-feather="search"></i>
                            <form action="" class="flex-grow ">
                                <input class="w-full text-sm placeholder:italic focus:outline-none" name="search"
                                    type="search" placeholder="Cari Beasiswa Anda Disini..." autocomplete="off">
                                <input id="FilterRequest" value="Nama Beasiswa" name="Filter" type="hidden">
                            </form>
                            <div class="h-full w-0.5 bg-gray-300 rounded-full"></div>
                            <button id="ButtonFilter" onclick="ShowDropdown()"
                                class="cursor-pointer focus:text-blue-600 group w-fit">
                                <i class="w-4 h-4 group-hover:text-blue-600" data-feather="filter"></i>
                            </button>
                            <div id="DropdownFilter"
                                class="absolute hidden w-48 p-2 mt-2 bg-white border-2 border-gray-200 rounded-md shadow-xl gap-y-2 z-41 top-full -right-1">
                                <div
                                    class="flex flex-col items-center justify-center w-full py-1 cursor-pointer group hover:bg-gray-200">
                                    <p id="FilterOption" class="text-sm group-hover:text-blue-600">Nama Beasiswa</p>
                                </div>
                                <div
                                    class="flex flex-col items-center justify-center w-full py-1 cursor-pointer group hover:bg-gray-200">
                                    <p id="FilterOption" class="text-sm group-hover:text-blue-600">Nama Instansi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid items-center w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-14 gap-x-6 gap-y-10">
                    @if (!empty($Lomba[0]))
                        @foreach ($Lomba as $Data)
                            <a href="{{ route('Website.Lomba.Detail', "id=$Data->id") }}"
                                class="p-4 duration-200 ease-in border-2 border-gray-200 rounded-md shadow-md cursor-pointer group hover:scale-105">
                                <div class="relative flex items-center justify-center w-full overflow-hidden bg-black rounded-md h-60"
                                    style="background-image: url('storage{{ $Data->foto_lomba }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    <div
                                        class="absolute z-40 px-4 py-1 bg-blue-600 rounded-full group-hover:hidden top-3 right-4">
                                        <p class="text-xs font-medium text-white">Internasional</p>
                                    </div>
                                    <div
                                        class="absolute z-30 flex-col items-center justify-center hidden w-full h-full p-5 group-hover:flex">
                                        <p class="text-sm italic font-light text-white line-clamp-6">
                                            "{{ $Data->persyaratan }}"</p>
                                    </div>
                                    <div class="absolute z-20 w-full h-full bg-black opacity-5 group-hover:opacity-75">
                                    </div>
                                </div>
                                <div class="w-full mx-1 mt-2">
                                    <p class="-mb-1 text-lg font-semibold line-clamp-1">{{ $Data->nama_perlombaan }}</p>
                                    <p class="text-sm">{{ $Data->Instansi->nama_instansi }}</p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="flex flex-col items-center justify-center w-full h-72">
                            <p>Data Tidak Tersedia [404]</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-col w-full mt-10 lg:mt-0 md:flex-row lg:flex-col gap-x-4 gap-y-12 lg:w-1/4">
                <div class="p-4 border-2 border-gray-200 rounded-lg shadow-lg grow h-fit">
                    <p class="text-lg font-semibold ">List Instansi Lomba</p>
                    <div class="flex flex-col mt-2 gap-y-2">
                        @foreach ($BestInstansi as $Data)
                            <div class="flex flex-row items-center px-3 py-2 gap-x-3 hover:bg-gray-200">
                                <div class="w-10 h-10 overflow-hidden bg-black rounded-full">
                                    <img src="storage/{{ $Data->foto_profile }}" class="object-cover w-full h-full">
                                </div>
                                <div>
                                    <p class="-mb-1 text-sm font-medium">{{ $Data->nama_instansi }}</p>
                                    <p class="text-xs">Telah Mengajukan {{ $Data->lomba_count }} Beasiswa</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="p-4 border-2 border-gray-200 rounded-lg shadow-lg grow h-fit">
                    <p class="text-lg font-semibold ">New Updates!</p>
                    <div class="flex flex-col mt-2 gap-y-2">
                        @foreach ($Highlight as $Data)
                            <a href="{{ route('Website.Beasiswa.Detail', "id=$Data->id") }}">
                                <div class="flex flex-row items-center px-3 py-2 gap-x-4 hover:bg-gray-200">
                                    <div class="w-16 h-10 overflow-hidden bg-black rounded-sm">
                                        <img src="storage{{ $Data->foto }}" class="object-cover w-full h-full">
                                    </div>
                                    <div class="-mt-1">
                                        <p class="-mb-1 text-sm font-medium line-clamp-1">{{ $Data->nama_event }}</p>
                                        <p class="text-xs line-clamp-1">"{{ $Data->persyaratan }}"</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
