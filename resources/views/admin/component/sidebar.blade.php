<div id="sidebar"
    class="fixed inset-y-0 left-0 mt-16 transition-transform duration-300 ease-in-out transform -translate-x-full md:static w-fit bg-3A3838 md:translate-x-0">
    <div class="flex flex-col items-center pb-20 pt-11">
        <div class="flex flex-col mb-10 gap-y-2">
            <a href="/dashboard-admin">
                <button class="sidebar-button{{ Route::is('Dashboard.*') ? '-actived' : '' }} gap-x-3">
                    <img class="mb-0.5" src="/webdevelp/icons/vector_houses.svg" alt="Dashboard Icon">
                    <p>Dashboard</p>
                </button>
            </a>
            <a href="/index-beasiswa">
                <button class="sidebar-button{{ Route::is('Beasiswa.*') ? '-actived' : '' }} gap-x-3">
                    <img src="/webdevelp/icons/toga_icon.svg" alt="Beasiswa Icon">
                    <p>Beasiswa</p>
                </button>
            </a>
            <a href="/index-lomba">
                <button class="sidebar-button{{ Route::is('Lomba.*') ? '-actived' : '' }} gap-x-3">
                    <img src="/webdevelp/icons/vector_champs.svg" alt="Lomba Icon">
                    <p>Lomba</p>
                </button>
            </a>
            <a href="/index-prestasi">
                <button class="sidebar-button{{ Route::is('Prestasi.*') ? '-actived' : '' }} gap-x-3">
                    <img src="/webdevelp/icons/toga_icon.svg" alt="Prestasi Icon">
                    <p>Prestasi</p>
                </button>
            </a>
        </div>
        <div class="flex flex-col gap-y-2">
            <a href="{{ route('Instansi.Index') }}">
                <button class="sidebar-button{{ Route::is('Instansi.*') ? '-actived' : '' }} gap-x-3">
                    <img class="mb-0.5" src="/webdevelp/icons/vector_houses.svg" alt="Daftar Instansi Icon">
                    <p>Daftar Instansi</p>
                </button>
            </a>
        </div>
        <form action="/logout-account" class="flex flex-col justify-end grow" method="POST">
            @csrf
            <button type="submit"
                class="group cursor-pointer p-0.5 w-[234px] h-[38px] bg-gradient-to-br rounded-md from-[#6889FF] to-[#8F31B0] flex justify-center items-center">
                <div
                    class="flex flex-row items-center justify-center w-full h-full rounded-md group-hover:bg-transparent gap-x-1 bg-3A3838">
                    <img src="/webdevelp/icons/logout_admin.svg" alt="Logout Icon">
                    <p class="font-light text-[13px] text-white">Log Out Account</p>
                </div>
            </button>
        </form>
    </div>
</div>
