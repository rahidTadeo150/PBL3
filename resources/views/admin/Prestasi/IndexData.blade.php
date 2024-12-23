@extends('Layout.AdminLayout')

@section('Content')
    @if (Session('Success'))
    @include('Modal.SuccessModalCRUD')
    @endif
    <div class="absolute inset-x-0 inset-y-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white absolute z-[51] w-[500px] h-fit py-[8px] rounded-[5px] px-[10px] flex flex-col gap-y-[10px]">
            <div class="flex flex-col items-end w-full">
                <i class="w-[16px]" data-feather="x"></i>
            </div>
            <div class="grid w-full grid-rows-2 place-items-center">
                <div>
                    <p class="w-full text-[15px] font-medium text-center mb-[40px]">Masukan Range Tanggal Prestasi Yang Ingin di cetak</p>
                    <div class="flex flex-col items-center w-full">
                        <div class="grid w-11/12 grid-cols-7 place-items-center">
                            <div class="relative z-0 w-full col-span-3">
                                <input name="TanggalPerlombaan" value="{{ old('TanggalPerlombaan') }}" autocomplete="off" type="date" id="floating_standard" class="block py-1 px-0 w-full text-[13px] text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                <label for="floating_standard" class="absolute text-[14px] text-gray-900 duration-300 transform -translate-y-7 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-[30px] rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">From Date</label>
                                @error ('TanggalPerlombaan')
                                    <p class="text-[12px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                @enderror
                            </div>
                            <p class="w-fit text-[11px] font-medium">To</p>
                            <div class="relative z-0 w-full col-span-3">
                                <input name="TanggalPerlombaan" value="{{ old('TanggalPerlombaan') }}" autocomplete="off" type="date" id="floating_standard" class="block py-1 px-0 w-full text-[13px] text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                <label for="floating_standard" class="absolute text-[14px] text-gray-900 duration-300 transform -translate-y-7 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-[30px] rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">End Date</label>
                                @error ('TanggalPerlombaan')
                                    <p class="text-[12px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button class="w-3/6 bg-green-500 py-[10px] text-[13px] text-white row-span-2 flex flex-row justify-center items-center leading-none gap-x-[10px]">
                    <i data-feather="printer"></i>
                    <p class="">Generate PDF</p>
                </button>
            </div>
        </div>
    </div>
    <p class="text-2xl font-semibold">Index Data Prestasi</p>
    <p class="text-sm font-normal text-gray-700">Daftar Prestasi Mahasiswa yang telah terdaftar di Lobi Poliwangi</p>
    <div class="w-full mt-6 mb-8 border-b-2 border-b-gray-700"></div>
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
                    <div id="ButtonFilter" onclick="ShowDropdown()" class="flex flex-row items-center justify-between w-full h-full cursor-pointer">
                        <p class="text-white text-[15px]">Filter</p>
                        <i class="w-[20px] h-[20px] text-white" data-feather="chevron-down"></i>
                    </div>
                    <div id="DropdownFilter" class="hidden left-0 mt-[10px] py-[10px] px-[10px] w-[180px] bg-white shadow-xl rounded-md absolute z-50">
                        <ul class="flex flex-col w-full gap-y-2">
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
                <button class="flex flex-row items-center justify-center gap-x-3 w-fit h-[41px] px-3 bg-blue-600 rounded-md">
                        <i class="w-[20px] h-[20px] text-white" data-feather="printer"></i>
                        <p class="text-sm text-gray-50">Cetak PDF</p>
                </button>
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
    <p class="mb-3 text-sm text-slate-800">Data Yang Ditemukan : {{ $TotalDatas }}</p>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 rounded-md dark:text-gray-400">
            <thead class="text-xs text-gray-400 uppercase bg-gray-700">
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
                <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
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
                    <td class="px-6 py-4 text-sm font-normal text-center text-white">
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
                    <td colspan="6" class="py-6 text-center text-black">Data Tidak Tersedia</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="\JavascriptDevelp\DropdownFilter.js"></script>
    <script src="\JavascriptDevelp\CloseModal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
@endsection
