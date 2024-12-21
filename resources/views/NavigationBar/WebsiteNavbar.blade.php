{{-- <div class="fixed z-50 w-full bg-white shadow-xl">
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
            @if (Auth::guard('Mahasiswa')->check())
                <div class="relative">
                    <div id="AvatarAccount" class="w-[42px] h-[42px] overflow-hidden rounded-full cursor-pointer">
                        <img class="w-full h-full" src="storage/{{ Auth::guard('Mahasiswa')->user()->foto_mahasiswa }}">
                    </div>
                    <div id="AccountDropdown"
                        class="hidden absolute w-[180px] bg-white border border-gray-200 shadow-xl rounded-sm right-0 mt-[8px] py-[5px] px-[5px]">
                        <a href="{{ route('Login.Logout') }}">
                            <div
                                class="flex flex-col items-center w-full cursor-pointer hover:bg-slate-200 hover:font-medium">
                                <p class="text-[13px] py-[5px]">Ajukan Prestasi</p>
                            </div>
                        </a>
                        <a href="{{ route('Login.Logout') }}">
                            <div
                                class="flex flex-col items-center w-full cursor-pointer hover:bg-slate-200 hover:font-medium">
                                <p class="text-[13px] py-[5px]">Log Out Account</p>
                            </div>
                        </a>
                    </div>
                </div>
            @else
                <a href="{{ route('Login.LoginMethod') }}">
                    <div
                        class="group ease-in-out duration-150 px-[50px] py-[7px] border-2 rounded-[5px] hover:scale-105 border-blue-600 hover:bg-blue-600">
                        <p class="text-[13px] font-medium group-hover:text-white text-blue-600 group-hover:scale-105">
                            Log In</p>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>
<script src="\JavascriptDevelp\AccountDropdown.js"></script> --}}


<nav class="flex items-center justify-between py-4">
    <a href="{{ route('Website.LandingPage') }}">
        <img src="\webdevelp\logolobi\Logo-Lobi-01.png" alt="Logo Lobi Poliwangi" class="h-10">
    </a>

    <!-- Hamburger Menu -->
    <div class="lg:hidden">
        <button id="menu-toggle" class="text-slate-800 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Menu Items -->
    <div class="hidden space-x-4 lg:flex lg:justify-center lg:items-center" id="menu">
        <a href="{{ route('Website.Beasiswa.Index') }}" class="text-slate-800">Beasiswa</a>
        <a href="{{ route('Website.Lomba.Index') }}" class="text-slate-800">Lomba</a>
        <a href="{{ route('Website.Prestasi.Index') }}" class="text-slate-800">Prestasi</a>
        @if (Auth::guard('Mahasiswa')->check())
            <div class="relative">
                <div id="AvatarAccount" class="w-[42px] h-[42px] overflow-hidden rounded-full cursor-pointer">
                    <img src="storage/{{ Auth::guard('Mahasiswa')->user()->foto_mahasiswa }}" alt="Avatar"
                        class="w-10 h-10 rounded-full cursor-pointer">
                </div>

                <div id="AccountDropdown"
                    class="absolute right-0 hidden w-48 mt-2 bg-white border border-white shadow-lg bg-grey-200">
                    <a href="{{ route('Login.Logout') }}" class="block px-4 py-2 hover:bg-grey-200">Ajukan
                        Prestasi</a>
                    <a href="{{ route('Login.Logout') }}" class="block px-4 py-2 hover:bg-grey-200">Log Out</a>
                </div>
            </div>
        @else
            <a href="{{ route('Login.LoginMethod') }}"
                class="px-4 py-2 transition-all duration-300 ease-in-out border-2 rounded text-slate-800 border-grey-200 hover:bg-slate-800 hover:text-white ">Log
                In</a>
        @endif
    </div>
</nav>

<!-- Mobile Menu -->
<div class="lg:hidden" id="mobile-menu" style="display: none;">
    <div class="flex flex-col space-y-2">
        <a href="{{ route('Website.Beasiswa.Index') }}" class="block text-grey-200">Beasiswa</a>
        <a href="{{ route('Website.Lomba.Index') }}" class="block text-grey-200">Lomba</a>
        <a href="{{ route('Website.Prestasi.Index') }}" class="block text-grey-200">Prestasi</a>
        @if (Auth::guard('Mahasiswa')->check())
            <div class="relative">
                <div id="AvatarAccount" class="w-[42px] h-[42px] overflow-hidden rounded-full cursor-pointer">
                    <img src="storage/{{ Auth::guard('Mahasiswa')->user()->foto_mahasiswa }}" alt="Avatar"
                        class="w-10 h-10 rounded-full cursor-pointer">
                </div>

                <div id="AccountDropdown"
                    class="absolute right-0 hidden w-48 mt-2 bg-white border border-white shadow-lg bg-grey-200">
                    <a href="{{ route('Login.Logout') }}" class="block px-4 py-2 hover:bg-grey-200">Ajukan
                        Prestasi</a>
                    <a href="{{ route('Login.Logout') }}" class="block px-4 py-2 hover:bg-grey-200">Log Out</a>
                </div>
            </div>
        @else
            <a href="{{ route('Login.LoginMethod') }}"
                class="px-4 py-2 text-white border-2 rounded border-grey-200 hover:bg-white hover:text-white">Log
                In</a>
        @endif
    </div>
</div>

<script>
    // JavaScript to toggle mobile menu
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menu = document.getElementById(' menu');

    menuToggle.addEventListener('click', () => {
        if (mobileMenu.style.display === "none" || mobileMenu.style.display === "") {
            mobileMenu.style.display = "block";
        } else {
            mobileMenu.style.display = "none";
        }
    });
</script>
<script src="\JavascriptDevelp\AccountDropdown.js"></script>
