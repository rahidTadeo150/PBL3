@extends('Layout.WebsiteLayout')

@section('Content')
    <div class="relative w-[1349px] h-[424px]">
        <div class="absolute z-30 inset-x-0 top-1/3 bottom-2/3 flex flex-col justify-center items-center">
            <p class="text-white font-bold text-[36px]">Form Pengajuan Prestasi</p>
            <p class="text-white text-[15px] mt-[18px]">Formulir Pengajuan Prestasi Mahasiswa</p>
            <p class="text-white text-[15px]">Politeknik Negeri Banyuwangi</p>
        </div>
        <img class="absolute z-20 w-full h-full object-cover object-center" src="webdevelp\image\Header-Form.png">
    </div>
    <div class="relative w-[1349px] flex flex-col items-center">
        <div class="absolute z-40 -mt-[160px] w-[1203px] h-fit bg-white border rounded-[3px] border-[#B6B6B6] pt-[37px] pb-[20px]">
            <div class="ml-[66px] mb-[24px]">
                <p class="font-semibold text-[24px]">Detail Prestasi</p>
                <p class="text-[#262626] text-[16px]">Form Pengisian Detail Prestasi Mahasiswa Poliwangi</p>
            </div>
            <div class="mx-[48px] bg-black rounded-full h-[1px]"></div>
            <form action="{{ route('Account.SendingRequestPrestasi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-[30px] mx-[69px]">
                    <div class="flex flex-row items-center justify-between mb-[73px]">
                        <div>
                            <div class="flex flex-row gap-x-[7px] mb-[14px]">
                                <i class="w-[18px] h-[18px]" stroke-width="1.5px" data-feather="user-check"></i>
                                <p class="text-[13px]">User Information</p>
                            </div>
                            <div class="mb-[51px]">
                                <div class="w-fit flex flex-row items-center gap-x-[16px] px-[27px] py-[16px] bg-[#F9F9F9] rounded-full">
                                    <img class="w-[61px] h-[61px] rounded-full object-cover object-center" src="storage/{{ Auth::guard('Mahasiswa')->user()->foto_mahasiswa }}">
                                    <div class="flex flex-col -mt-[10px] w-[500px]">
                                        <p class="font-medium text-[15px] line-clamp-1">{{ Auth::guard('Mahasiswa')->user()->nama_mahasiswa }}</p>
                                        <p class="text-[12px] line-clamp-1">{{ Auth::guard('Mahasiswa')->user()->Prodi->nama_prodi }} - {{ Auth::guard('Mahasiswa')->user()->Prodi->Jurusan->nama_jurusan }}</p>
                                    </div>
                                    <input name="IdMahasiswa" type="hidden" value="{{ Auth::guard('Mahasiswa')->user()->id }}">
                                </div>
                            </div>
                            <div class="flex flex-row gap-x-[11px] mb-[14px]">
                                <i class="w-[18px] h-[18px]" stroke-width="1.5px" data-feather="edit-3"></i>
                                <p class="text-[13px]">Form Detail Prestasi</p>
                            </div>
                            <div class="flex flex-col gap-y-[22px] mb-[26px]">
                                <div class="flex flex-col gap-y-[3px] text-[12px]">
                                    <label for="NamaPerlombaan">Nama Perlombaan</label>
                                    <input class="bg-[#F9F9F9] px-[5px] placeholder:italic placeholder:font-light w-[470px] h-[30px] rounded-[3px] border-[0.3px] border-black focus:outline-[0.3px] focus:outline-blue-600" name="NamaPerlombaan" placeholder="Masukan Nama Perlombaan..." type="text">
                                    @error ('NamaPerlombaan')
                                    <p class="mt-2 text-[13px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col gap-y-[3px] text-[12px]">
                                    <label for="UrutanPrestasi">Urutan Kejuaraan Prestasi</label>
                                    <input class="bg-[#F9F9F9] px-[5px] placeholder:italic placeholder:font-light w-[280px] h-[30px] rounded-[3px] border-[0.3px] border-black focus:outline-[0.3px] focus:outline-blue-600" name="UrutanPrestasi" placeholder="Masukan Urutan Kejuaraan..." type="text">
                                    @error ('UrutanPrestasi')
                                    <p class="mt-2 text-[13px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                    @enderror
                                    <p class="text-[11px] text-[#3f3f3f]">* Example : Juara 2, Juara Harapan 1, etc. </p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-y-[22px]">
                                <div class="flex flex-col gap-y-[3px] text-[12px]">
                                    <label for="TanggalPerlombaan">Tanggal Perlombaan</label>
                                    <input class="bg-[#F9F9F9] px-[10px] w-[280px] h-[30px] rounded-[3px] border-[0.3px] border-black focus:outline-[0.3px] focus:outline-blue-600" name="TanggalPerlombaan" type="date">
                                    @error ('TanggalPerlombaan')
                                    <p class="mt-2 text-[13px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-row w-[470px] justify-between gap-x-[40px]">
                                    <div class="flex flex-col gap-y-[3px] text-[12px] grow">
                                        <label for="Tingkatan">Tingkatan Perlombaan</label>
                                        <select class="bg-[#F9F9F9] px-[5x] h-[30px] rounded-[3px] border-[0.3px] border-black focus:outline-[0.3px] focus:outline-blue-600" name="Tingkatan">
                                            <option value="">Pilih Tingkatan</option>
                                            @foreach ($Tingkatan as $Tingkatan)
                                            <option value="{{ $Tingkatan->id }}">{{ $Tingkatan->tingkatan }}</option>
                                            @endforeach
                                        </select>
                                        @error ('Tingkatan')
                                        <p class="mt-2 text-[13px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col gap-y-[3px] text-[12px] grow">
                                        <label for="NamaPerlombaan">Kategori Perlombaan</label>
                                        <select class="bg-[#F9F9F9] px-[5x] h-[30px] rounded-[3px] border-[0.3px] border-black focus:outline-[0.3px] focus:outline-blue-600" name="CategoryPerlombaan">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($Category as $Category)
                                            <option value="{{ $Category->id }}">{{ $Category->category }}</option>
                                            @endforeach
                                        </select>
                                        @error ('CategoryPerlombaan')
                                        <p class="mt-2 text-[13px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row gap-x-[7px] mb-[14px]">
                                <i class="w-[18px] h-[18px]" stroke-width="1.5px" data-feather="file"></i>
                                <p class="text-[13px]">Image Input</p>
                            </div>
                            <div class="flex flex-col items-center w-fit">
                                <div class="relative flex flex-col px-[36px] justify-center items-center w-[346px] h-[346px] border-[1.8px] border-black border-dashed rounded-[5px]">
                                    <img id="ImagePreview" class="absolute z-50 w-full h-full hidden" src="">
                                    <i class="w-[114px] h-[114px] text-[#7188FA]" data-feather="upload-cloud" stroke-width="1.5px"></i>
                                    <p class="font-semibold text-[21px] text-center">Upload Your <span class="text-[#7188FA]">Image Files</span> at <span class="text-[#7188FA]">Here</span> Box</p>
                                </div>
                                @error ('FotoPrestasi')
                                <p class="mt-2 text-[13px] text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                @enderror
                                <p class="font-medium text-[12px] mb-[15px]">File Size: <span id="DescSize">0</span> MB</p>
                                <label for="FotoInput" class="cursor-pointer py-[6px] px-[97px] bg-[#515EF2] flex flex-col items-center justify-center rounded">
                                    <p class="text-white font-medium text-[13px]">Browse Local File</p>
                                </label>
                                <input class="hidden" type="file" name="FotoPrestasi" id="FotoInput">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-fit bg-[#386FFA] rounded-full px-[72px] py-[6px]">
                        <div class="flex flex-row text-white">
                            <i class="w-[24px] h-[24px]" stroke-width="1.5px" data-feather="send"></i>
                            <p class="text-[18px] font-semibold">Send It</p>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="\JavascriptDevelp\PreviewImage.js"></script>
@endsection
