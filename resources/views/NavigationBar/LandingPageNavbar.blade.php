<nav class="flex items-center justify-between py-4">
    <a href="{{ route('Website.LandingPage') }}">
        <img src="\webdevelp\logolobi\Logo-Lobi-White-Longtext.png" alt="Logo Lobi Poliwangi" class="h-[60px]">
    </a>

    <!-- Hamburger Menu -->
    <div class="lg:hidden">
        <button id="menu-toggle" class="text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Menu Items -->
    <div class="hidden space-x-4 lg:flex lg:justify-center lg:items-center gap-x-[30px] text-[14px] font-medium" id="menu">
        <a href="{{ route('Website.Beasiswa.Index') }}" class="text-white">Beasiswa</a>
        <a href="{{ route('Website.Lomba.Index') }}" class="text-white">Lomba</a>
        <a href="{{ route('Website.Prestasi.Index') }}" class="text-white">Prestasi</a>
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
                class="px-[30px] py-2 transition-all duration-300 ease-in-out border rounded text-white border-white hover:bg-white hover:border-white hover:text-blue-800 ">Log
                In</a>
        @endif
    </div>
</nav>

<!-- Mobile Menu -->
<div class="lg:hidden" id="mobile-menu" style="display: none;">
    <div class="flex flex-col space-y-2">
        <a href="{{ route('Website.Beasiswa.Index') }}" class="block text-white">Beasiswa</a>
        <a href="{{ route('Website.Lomba.Index') }}" class="block text-white">Lomba</a>
        <a href="{{ route('Website.Prestasi.Index') }}" class="block text-white">Prestasi</a>
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
<script src="\JavascriptDevelp\AccountDropdown.js"></script>
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
