@extends('Layout.AdminLayout')

@section('Content')
    <div>
        @if (Session('Success'))
        @include('Modal.SuccessModalCRUD')
        @endif
        <p class="text-2xl font-semibold">Edit Mahasiswa Berprestasi</p>
        <p class="text-sm text-gray-700 font-normal">Form Edit Data Mahasiswa Berprestasi Lobi Poliwangi</p>
        <div class="w-full border-b-2 border-b-gray-700 mt-6 mb-14"></div>
        <p class="text-[14px] font-semibold">Step 1: Input Mahasiswa</p>
        <p class="mb-5 text-[12px]">Berikut Detail Mahasiswa Poliwangi Yang Anda Inputkan Untuk Data Prestasi ini</p>
        <div class="mb-16 max-w-sm min-w-full px-6 py-5 pt-7 bg-white rounded-lg shadow border-l-8 border-l-sky-400 border border-gray-200">
            <div class="flex flex-row items-center gap-x-5">
                <div class="w-[60px] h-[60px] bg-black rounded-full overflow-hidden">
                    <img class="w-full h-full" src="\storage\{{ $DataMahasiswa->foto_mahasiswa }}">
                </div>
                <div>
                    <h5 class="text-[17px] font-semibold text-gray-900">{{  $DataMahasiswa->nama_mahasiswa }}</h5>
                    <p class="text-[13px] text-gray-700 -mt-[3px] mb-[2px]">{{  $DataMahasiswa->nim }}</p>
                    <p class="mt-[3px] text-[13px] text-gray-700">{{ $DataMahasiswa->Prodi->nama_prodi }} ({{ $DataMahasiswa->Prodi->Jurusan->nama_jurusan }})</p>
                </div>
            </div>
            <div class="w-full text-end">
                <a href="{{ route('Prestasi.MahasiswaSelect') }}?ChangesMahasiswa=True&IdPrestasi={{ $Data->id }}" class="text-blue-500 font-medium text-[13px] hover:underline">
                    Ganti Mahasiswa
                </a>
            </div>
        </div>
        <div>
            <form action="{{ route('Prestasi.Update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <p class="text-[14px] font-semibold">Step 2: Detail Prestasi Yang Akan Di Publish</p>
                <p class="mb-10 text-[12px]">Harap Memasukan Detail Data dengan Teliti dan Benar Pada Saat Penginputan!</p>
                <div class="flex flex-row justify-between items-center px-5">
                    <div>
                        <input type="hidden" name="IdMahasiswa" value="{{  $Data->Mahasiswa->id }}">
                        <input type="hidden" name="IdPrestasi" value="{{ $Data->Prestasi->id }}">
                        <input type="hidden" name="IdEdit" value="{{ $Data->id }}">
                        <div class="relative z-0 w-96 mb-5">
                            <input name="NamaPerlombaan" value="{{ $Data->Prestasi->nama_perlombaan }}" autocomplete="off" type="text" id="floating_standard" class="mb-[5px] block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                            <label for="floating_standard" class="absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama Perlombaan</label>
                            @error ('NamaPerlombaan')
                                <p class="text-[12px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative z-0 w-96 mb-9">
                            <input name="UrutanPrestasi" value="{{ $Data->posisi_juara }}" autocomplete="off" type="text" id="floating_standard" class="mb-[5px] block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                            <label for="floating_standard" class="absolute text-sm text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Urutan Kejuaraan Prestasi</label>
                            @error ('UrutanPrestasi')
                                <p class="mb-[3px] text-[12px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                            <p class="text-[12px] text-[#274DE3]">* Contoh Pengisian : Juara 2</p>
                        </div>
                        <div class="relative z-0 w-[280px] mb-9">
                            <input name="TanggalPerlombaan" value="{{ $Data->Prestasi->tanggal_perlombaan }}" autocomplete="off" type="date" id="floating_standard" class="mb-[5px] block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                            <label for="floating_standard" class="absolute text-lg text-gray-900 duration-300 transform -translate-y-7 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-9 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tanggal Perlombaan</label>
                            @error ('TanggalPerlombaan')
                                <p class="text-[12px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative z-0 w-80 mb-9">
                            <select name="CategoryPerlombaan" autocomplete="off" type="date" id="floating_standard" class="mb-[5px] block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value=""> - Pilih Kategori Perlombaan - </option>
                                @foreach ($Category as $Category)
                                <option value="{{ $Category->id }}" class="text-sm font-normal pl-2 pr-2" {{ $Data->Prestasi->category_prestasi_id == $Category->id ? 'selected' : '' }}>{{ $Category->category }}</option>
                                @endforeach
                            </select>
                            @error ('CategoryPerlombaan')
                                <p class="text-[12px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                            <label for="floating_standard" class="absolute text-lg text-gray-900 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-9 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tingkatan Perlombaan</label>
                        </div>
                        <div class="relative z-0 w-80 mb-9">
                            <select name="Tingkatan" autocomplete="off" type="date" id="floating_standard" class="mb-[5px] block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value=""> - Pilih Tingkatan Perlombaan - </option>
                                @foreach ($Tingkatan as $Tingkatan)
                                <option value="{{ $Tingkatan->id }}" class="text-sm font-normal pl-2 pr-2" {{ $Data->Prestasi->tingkatan_id == $Tingkatan->id ? 'selected' : '' }}>{{ $Tingkatan->tingkatan }}</option>
                                @endforeach
                            </select>
                            @error ('Tingkatan')
                                <p class="text-[12px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                            <label for="floating_standard" class="absolute text-lg text-gray-900 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-9 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tingkatan Perlombaan</label>
                        </div>
                        <div class="flex mt-14">
                            <div class="flex items-center h-5">
                                <input id="SubmitCheckbox" onclick="SubmitEnabled()" type="checkbox" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded mt-4 outline-0" required>
                            </div>
                            <div class="ms-4 text-sm">
                                <label for="helper-checkbox" class="font-bold text-base text-gray-900">Harap Cek lagi Kevalidan Data</label>
                                <p id="helper-checkbox-text" class="text-sm font-normal text-gray-500">Pastikan Data Valid Dan Benar Sebelum di Post </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-y-2">
                        <p class="text-black font-semibold text-[20px]">Upload Dokumentasi Prestasi</p>
                        <div class="flex flex-col overflow-hidden justify-center items-center relative w-[330px] h-[330px] border-2 border-dashed rounded-md border-black">
                            <img id="ImagePreview" class="absolute z-50 bg-contain h-full w-full hidden" src="">
                            <img class="absolute z-10 bg-contain h-full w-full" src="\storage\{{ $Data->Prestasi->foto_bukti_prestasi }}">
                        </div>
                        <p class="font-medium text-[12px]">File Size: <span id="DescSize">0</span> MB</p>
                        @error('FotoPrestasi')
                            <p class="mb-[3px] text-[12px] text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                        <label for="FotoInput" class="cursor-pointer w-[250px] h-[38px] bg-[#58D42B] flex flex-col items-center justify-center rounded">
                            <p class="text-white font-semibold">Browse File</p>
                        </label>
                        <input class="hidden" type="file" name="FotoPrestasi" id="FotoInput">
                    </div>
                </div>
                <div class="flex flex-row">
                    <a href="{{ route('Prestasi.Index') }}" type="submit" class="p-3 pl-8 pr-8 bg-slate-400 mt-10 mb-10 w-fit rounded-md">
                        <p class="text-gray-900 text-md font-semibold">Cancel</p>
                    </a>
                    <button id="SubmitButton" onclick="confirm('Ingin Menyimpan Instansi Ini')" type="submit" class="disabled-submit-button ml-5 p-3 pl-8 pr-8 mt-10 mb-10 w-96 rounded-md" disabled>
                        <div class="flex flex-row justify-center items-center w-full h-full gap-x-2">
                            <i class="w-[20px] h-[20px] text-white" data-feather="file-plus"></i>
                            <p class="text-gray-100 font-semibold">Simpan Prestasi</p>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="\JavascriptDevelp\PreviewImage.js"></script>
    <script src="\JavascriptDevelp\FormButtonSwitch.js"></script>
    <script src="\JavascriptDevelp\CloseModal.js"></script>
@endsection
