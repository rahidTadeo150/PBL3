@extends('Layout.AdminLayout')

@section('Content')
    <p class="text-2xl font-semibold">Index Instansi Beasiswa</p>
    <p class="text-sm text-gray-700 font-normal">Daftar Instansi beasiswa yang telah terdaftar</p>
    <div class="w-full border-b-2 border-b-gray-700 mt-6 mb-8"></div>
    <a href="{{ route('Instansi.Create') }}">
        <button class=" flex flex-row gap-x-2 items-center py-[10px] px-[20px] bg-[#21CF11] mb-8 rounded">
            <i class="w-[20px] h-[20px] text-white" data-feather="plus"></i>
            <p class="text-white text-[13px] font-medium">Tambah Instansi</p>
        </button>
    </a>
    </form>
    <div class="flex flex-row justify-start mb-3">
        <form action="{{ route('Instansi.Index') }}" method="get">
            @csrf
            <div class="flex flex-row gap-x-3">
                <div class="flex flex-row items-center gap-x-2 rounded-md px-3 bg-white border-[1px] ring-offset-1 border-gray-400">
                    <i class="w-[20px] h-[20px]" data-feather="search"></i>
                    <input name="search" class="focus:outline-none bg-transparent w-[350px] py-[9px] text-[14px]" type="search">
                </div>
                <div id="ButtonFilter" onclick="ShowDropdown()" class="cursor-pointer relative bg-[#3A3838] px-[15px] w-[140px] h-[41px] rounded-md">
                    <div class="w-full h-full flex flex-row justify-between items-center">
                        <p class="text-white text-[15px]">Filter</p>
                        <i class="w-[20px] h-[20px] text-white" data-feather="chevron-down"></i>
                    </div>
                    <div id="DropdownFilter" class="hidden left-0 mt-[10px] py-[10px] px-[10px] w-[180px] bg-white shadow-xl rounded-md absolute z-50">
                        <ul class="w-full flex flex-col gap-y-2">
                            <li id="FilterOption" class="cursor-pointer hover:bg-gray-300 px-[5px] rounded-sm text-[13px] py-[5px] w-full">Nama Instansi</li>
                            <li id="FilterOption" class="cursor-pointer hover:bg-gray-300 px-[5px] rounded-sm text-[13px] py-[5px] w-full">Alamat Instansi</li>
                            <li id="FilterOption" class="cursor-pointer hover:bg-gray-300 px-[5px] rounded-sm text-[13px] py-[5px] w-full">Nomor Telephone</li>
                            <li id="FilterOption" class="cursor-pointer hover:bg-gray-300 px-[5px] rounded-sm text-[13px] py-[5px] w-full">Email Instansi</li>
                        </ul>
                        <input id="FilterRequest" value="Nama Instansi" name="Filter" type="hidden">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <p class="text-sm text-slate-800 mb-3 mt-10">Data Yang Ditemukan : {{ $TotalData }}</p>
    {{-- @if (!empty($InstansiSuccessAdded))
    <div class="flex flex-row items-center gap-x-3 full h-[36px] bg-[#68C049] px-[10px] mb-[20px] rounded-[5px]">
        <i class="w-[19px] h-[19px] text-white" data-feather="check-circle"></i>
        <p class="text-white text-[12px]">{{ $InstansiSuccessAdded }}</p>
    </div>
    @endif --}}
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rounded-md rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Foto Profile
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Nama Instansi
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($Datas[0]))
                @foreach ($Datas as $Instansi)
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <td class="px-6 py-4 text-sm font-normal text-white flex flex-col items-center">
                        <div class="w-[40px] h-[40px] rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover" src="/storage/{{ $Instansi->foto_profile }}">
                        </div>
                    </td>
                    <td class="min-w-[180px] px-6 py-4 text-sm font-normal text-white">
                        {{ $Instansi->nama_instansi }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-white">
                        {{ $Instansi->email }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-white">
                        {{ $Instansi->alamat }}
                    </td>

                    <td class="px-6 py-4 text-sm font-normal text-white text-center">
                        <div class="flex flex-row gap-x-3">
                            <a href="{{ route('Instansi.Edit', "IdInstansi=$Instansi->id") }}">
                                <div class="cursor-pointer w-[28px] h-[28px] rounded bg-[#D2CC10] flex flex-col items-center justify-center">
                                    <i class="w-[15px] h-[15px]" data-feather="edit-3"></i>
                                </div>
                            </a>
                            <form action="{{ route('Instansi.Delete', $Instansi->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus instansi ini?')" 
                                    class="cursor-pointer w-[28px] h-[28px] rounded bg-[#D02A2A] flex flex-col items-center justify-center">
                                    <i class="w-[15px] h-[15px]" data-feather="trash-2"></i>
                                </button>
                            </form>
                            
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center text-black py-6">Data Tidak Tersedia</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="\JavascriptDevelp\DropdownFilter.js"></script>
@endsection
