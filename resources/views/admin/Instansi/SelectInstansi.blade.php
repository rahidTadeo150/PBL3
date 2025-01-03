@extends('Layout.AdminLayout')

@section('Content')
<p class="text-2xl font-semibold">Pilih Instansi Beasiswa</p>
<p class="text-sm font-normal text-gray-700">Pilih Instansi Untuk Informasi Beasiswa Yang Akan Di Input</p>
<div class="w-full mt-6 mb-8 border-b-2 border-b-gray-700"></div>
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
                <div class="flex flex-row items-center justify-between w-full h-full">
                    <p class="text-white text-[15px]">Filter</p>
                    <i class="w-[20px] h-[20px] text-white" data-feather="chevron-down"></i>
                </div>
                <div id="DropdownFilter" class="hidden left-0 mt-[10px] py-[10px] px-[10px] w-[180px] bg-white shadow-xl rounded-md absolute z-50">
                    <ul class="flex flex-col w-full gap-y-2">
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
<p class="mt-10 mb-3 text-sm text-slate-800">Data Yang Ditemukan : {{ $TotalData }}</p>
{{-- @if (!empty($InstansiSuccessAdded))
<div class="flex flex-row items-center gap-x-3 full h-[36px] bg-[#68C049] px-[10px] mb-[20px] rounded-[5px]">
    <i class="w-[19px] h-[19px] text-white" data-feather="check-circle"></i>
    <p class="text-white text-[12px]">{{ $InstansiSuccessAdded }}</p>
</div>
@endif --}}
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 rounded-md rtl:text-right">
        <thead class="text-xs text-gray-400 uppercase bg-gray-700">
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
            <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
                <td class="flex flex-col items-center px-6 py-4 text-sm font-normal text-white">
                    <div class="w-[40px] rounded-full overflow-hidden">
                        <img class="w-full h-full" src="/storage/{{ $Instansi->foto_profile }}">
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
                @if (request()->has('ChangeInstansi'))
                <td class="px-6 py-4 text-sm font-normal text-white">
                    <a href="{{ route($RouteIdentity.'.Edit') }}?IdObject={{ request()->IdObject }}&IdInstansi={{ $Instansi->id }}">Ganti</a>
                </td>
                @else
                <td class="px-6 py-4 text-sm font-normal text-white">
                    <a href="{{route($RouteIdentity.'.Create') }}?IdInstansi={{ $Instansi->id }}">Pilih</a>
                </td>
                @endif
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
<script src="\JavascriptDevelp\DropdownFilter.js"></script>
@endsection
