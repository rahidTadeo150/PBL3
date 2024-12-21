<div class="w-full fixed z-50 bg-white shadow-xl">
    <div class="flex flex-row justify-between px-[35px] py-[8px]">
        <a href="{{ route('Website.LandingPage') }}">
            <div class="cursor-pointer w-[153px]">
                <img src="\webdevelp\logolobi\Logo-Lobi-01.png">
            </div>
        </a>
        <div class="flex flex-row items-center gap-x-10">
            <a href="{{ route('Website.Beasiswa.Index') }}">
                <p class="text-[14px] font-medium">Beasiswa</p>
            </a>
            <a href="{{ route('Website.Lomba.Index') }}">
                <p class="text-[14px] font-medium">Lomba</p>
            </a>
            <a href="{{ route('Website.Prestasi.Index') }}">
                <p class="text-[14px] font-medium">Prestasi</p>
            </a>
            @if(Auth::guard('Mahasiswa')->check())
            <div class="relative">
                <div id="AvatarAccount" class="w-[42px] h-[42px] overflow-hidden rounded-full cursor-pointer">
                    <img class="w-full h-full" src="storage/{{ Auth::guard('Mahasiswa')->user()->foto_mahasiswa }}">
                </div>
                <div id="AccountDropdown" class="hidden absolute w-[180px] bg-white border border-gray-200 shadow-xl rounded-sm right-0 mt-[8px] py-[5px] px-[5px]">
                    <a href="{{ route('Login.Logout') }}">
                        <div class="w-full hover:bg-slate-200 hover:font-medium cursor-pointer flex flex-col items-center">
                            <p class="text-[13px] py-[5px]">Ajukan Prestasi</p>
                        </div>
                    </a>
                    <a href="{{ route('Login.Logout') }}">
                        <div class="w-full hover:bg-slate-200 hover:font-medium cursor-pointer flex flex-col items-center">
                            <p class="text-[13px] py-[5px]">Log Out Account</p>
                        </div>
                    </a>
                </div>
            </div>
            @else
            <a href="{{ route('Login.LoginMethod') }}">
                <div class="group ease-in-out duration-150 px-[50px] py-[7px] border-2 rounded-[5px] hover:scale-105 border-blue-600 hover:bg-blue-600">
                    <p class="text-[13px] font-medium group-hover:text-white text-blue-600 group-hover:scale-105">Log In</p>
                </div>
            </a>
            @endif
        </div>
    </div>
</div>
<script src="\JavascriptDevelp\AccountDropdown.js"></script>
