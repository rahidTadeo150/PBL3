@extends('Layout.AdminLayout')

@section('Content')
    @if (Session('Success'))
    @include('Modal.SuccessModalCRUD')
    @endif
    <p class="text-2xl font-semibold">Index Data Prestasi</p>
    <p class="text-sm text-gray-700 font-normal">Daftar Prestasi Mahasiswa yang telah terdaftar di Lobi Poliwangi</p>
    <div class="w-full border-b-2 border-b-gray-700 mt-6 mb-8"></div>
    <a href="{{ route('Prestasi.MahasiswaSelect') }}">
        <button class=" flex flex-row gap-x-2 items-center py-[10px] px-[20px] bg-[#21CF11] mb-8 rounded">
            <i class="w-[20px] h-[20px] text-white" data-feather="plus"></i>
            <p class="text-white text-[13px] font-medium">Tambah Data</p>
        </button>
    </a>
    <div class="flex flex-row justify-between mb-3">
        <form action="" method="get>
            @csrf
            <div class="flex flex-row gap-x-3">
                <div class="flex flex-row items-center gap-x-2 rounded-md px-3 bg-white border-[1px] ring-offset-1 border-gray-400">
                    <i class="w-[20px] h-[20px]" data-feather="search"></i>
                    <input name="search" class="focus:outline-none bg-transparent w-[350px] py-[9px] text-[14px]" type="search">
                </div>
                <div class="relative bg-[#3A3838] px-[15px] w-[140px] h-[41px] rounded-md">
                    <div id="ButtonFilter" onclick="ShowDropdown()" class="cursor-pointer w-full h-full flex flex-row justify-between items-center">
                        <p class="text-white text-[15px]">Filter</p>
                        <i class="w-[20px] h-[20px] text-white" data-feather="chevron-down"></i>
                    </div>
                    <div id="DropdownFilter" class="hidden left-0 mt-[10px] py-[10px] px-[10px] w-[180px] bg-white shadow-xl rounded-md absolute z-50">
                        <ul class="w-full flex flex-col gap-y-2">
                            <li id="FilterOption" class="cursor-pointer hover:bg-gray-300 px-[5px] rounded-sm text-[13px] py-[5px] w-full">Nim</li>
                            <li id="FilterOption" class="cursor-pointer hover:bg-gray-300 px-[5px] rounded-sm text-[13px] py-[5px] w-full">Nama Mahasiswa</li>
                            <li id="FilterOption" class="cursor-pointer hover:bg-gray-300 px-[5px] rounded-sm text-[13px] py-[5px] w-full">Nama Perlombaan</li>
                        </ul>
                        <input id="FilterRequest" value="Nama Mahasiswa" name="Filter" type="hidden">
                    </div>
                </div>
            </div>
        </form>
        <div class="flex flex-row gap-x-3">
            <div>
                {{-- <a href="/index-instansi-beasiswa">
                    <button class="flex flex-row items-center justify-center gap-x-3 w-fit h-[41px] px-3 bg-blue-600 rounded-md">
                        <i class="w-[20px] h-[20px] text-white" data-feather="printer"></i>
                        <p class="text-sm text-gray-50">Cetak PDF</p>
                    </button>
                </a> --}}
            </div>
            <div>
                <a href="{{ route('Prestasi.History') }}">
                    <button class="flex flex-row items-center justify-center gap-x-3 w-fit h-[41px] px-3 bg-black rounded-md">
                        <i class="w-[20px] h-[20px] text-white" data-feather="clock"></i>
                        <p class="text-sm text-gray-50">History Data</p>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <p class="text-sm text-slate-800 mb-3">Data Yang Ditemukan : {{ $TotalDatas }}</p>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rounded-md text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Foto Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Nama Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Nama Prestasi
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold text-center">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($Datas[0]))
                @foreach ($Datas as $Prestasi)
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <th scope="row" class="px-10 py-4 text-sm font-normal text-white">
                        <div class="w-[55px] h-[55px] overflow-hidden rounded-full">
                            <img src="/storage{{ $Prestasi->Mahasiswa->foto_mahasiswa }}" class="w-full h-full">
                        </div>
                    </th>
                    <td class="px-6 py-4 text-sm font-normal text-white">
                        {{ $Prestasi->Mahasiswa->nim }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-white">
                        {{ $Prestasi->Mahasiswa->nama_mahasiswa }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-white">
                        {{ $Prestasi->Prestasi->nama_perlombaan }} ({{ $Prestasi->posisi_juara }})
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-white">
                        {{ $Prestasi->Prestasi->CategoryPrestasi->category }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-white text-center">
                        <div class="flex flex-row gap-x-3">
                            <a href="{{ route('Prestasi.Edit', "IdPrestasi=$Prestasi->id") }}">
                                <div class="cursor-pointer w-[28px] h-[28px] rounded bg-[#D2CC10] flex flex-col items-center justify-center">
                                    <i class="w-[15px] h-[15px]" data-feather="edit-3"></i>
                                </div>
                            </a>
                            <form action="{{ route('Prestasi.Delete') }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="IdPrestasi" value="{{ $Prestasi->id }}">
                                <button type="submit" class="cursor-pointer w-[28px] h-[28px] rounded bg-[#D02A2A] flex flex-col items-center justify-center">
                                    <i class="w-[15px] h-[15px]" data-feather="trash-2"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center text-black py-6">Data Tidak Tersedia</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="\JavascriptDevelp\DropdownFilter.js"></script>
    <script src="\JavascriptDevelp\CloseModal.js"></script>
@endsection
