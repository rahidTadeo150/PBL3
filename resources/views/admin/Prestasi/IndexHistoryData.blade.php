@extends('Layout.AdminLayout')

@section('Content')
    <p class="text-2xl font-semibold">Index History Data Prestasi</p>
    <p class="text-sm font-normal text-gray-700">Daftar Prestasi Mahasiswa yang telah Terhapus</p>
    <div class="w-full mt-6 mb-8 border-b-2 border-b-gray-700"></div>
    <a href="{{ route('Instansi.Selection', ['Prestasi' => 'true']) }}">
        <button class=" flex flex-row gap-x-2 items-center py-[10px] px-[20px] bg-[#21CF11] mb-8 rounded">
            <i class="w-[20px] h-[20px] text-white" data-feather="plus"></i>
            <p class="text-white text-[13px] font-medium">Tambah Data</p>
        </button>
    </a>
    <div class="flex flex-row justify-between mb-3">
        <form action="" method="get">
            @csrf
            <div class="flex flex-row gap-x-3">
                <div class="flex flex-row items-center gap-x-2 rounded-md px-3 bg-white border-[1px] ring-offset-1 border-gray-400">
                    <i class="w-[20px] h-[20px]" data-feather="search"></i>
                    <input class="focus:outline-none bg-transparent w-[350px] py-[9px] text-[14px]" type="search">
                </div>
                <div class="relative bg-[#3A3838] px-[15px] w-[140px] h-[41px] rounded-md">
                    <div class="flex flex-row items-center justify-between w-full h-full">
                        <p class="text-white text-[15px]">Filter</p>
                        <i class="w-[20px] h-[20px] text-white" data-feather="chevron-down"></i>
                    </div>
                    <div class="hidden left-0 mt-[10px] py-[10px] px-[10px] w-[180px] bg-white rounded-md absolute z-50">
                        <ul class="flex flex-col w-full gap-y-3">
                            <a href="" class="w-full group">
                                <li class="hover:bg-gray-300 px-[5px] rounded-sm text-[15px] py-[5px] w-full">Nama Beasiswa</li>
                            </a>
                            <a href="" class="w-full group">
                                <li class="hover:bg-gray-300 px-[5px] rounded-sm text-[15px] py-[5px] w-full">Nama Instansi</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
        <div class="flex flex-row gap-x-3">
            <div>
                <a href="{{ route('Prestasi.Index') }}">
                    <button class="flex flex-row items-center justify-center gap-x-3 w-fit h-[41px] px-3 bg-black rounded-md">
                        <i class="w-[20px] h-[20px] text-white" data-feather="clock"></i>
                        <p class="text-sm text-gray-50">Data Terposting</p>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <p class="mb-3 text-sm text-slate-800">Data Yang Ditemukan : {{ $TotalDatas }}</p>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 rounded-md rtl:text-right dark:text-gray-400">
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
                        <div class="w-[75px] h-[75px] rounded overflow-hidden">
                            <img src="/storage/{{ $Prestasi->Mahasiswa->foto_mahasiswa }}" class="w-full h-full">
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
                    <td>
                        <form action="{{ route('Prestasi.Restore') }}" method="POST">
                            @csrf
                            <input type="hidden" name="IdPrestasi" value="{{ $Prestasi->Prestasi->id }}">
                            <input type="hidden" name="IdMahasiswaPrestasi" value="{{ $Prestasi->id }}">
                            <button type="submit" class="text-blue-500 hover:underline">Restore</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="py-6 text-center text-black">Data Tidak Tersedia</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
