<div class="w-[265px] h-[641px] bg-3A3838 flex flex-col items-center pt-11 pb-20">
    <div class="flex flex-col gap-y-2 mb-[40px]">
        <a href="/dashboard-admin">
            <button class="sidebar-button{{ (Route::is('Dashboard.*')) ? '-actived'  : '' }} gap-x-3">
                <img class="mb-0.5" src="/webdevelp/icons/vector_houses.svg">
                <p>Dashboard</p>
            </button>
        </a>
        <a href="/index-beasiswa">
            <button class="sidebar-button{{ (Route::is('Beasiswa.*')) ? '-actived'  : '' }} gap-x-[10px]">
                <img src="\webdevelp\icons\toga_icon.svg">
                <p>Beasiswa</p>
            </button>
        </a>
        <a href="/index-lomba">
            <div class="sidebar-button{{ (Route::is('Lomba.*')) ? '-actived'  : '' }} gap-x-[16px]">
                <img src="\webdevelp\icons\vector_champs.svg">
                <p>Lomba</p>
            </div>
        </a>
        <a href="/index-prestasi">
            <div class="sidebar-button{{ (Route::is('Prestasi.*')) ? '-actived'  : '' }} gap-x-[16px]">
                <img src="\webdevelp\icons\toga_icon.svg">
                <p>Prestasi</p>
            </div>
        </a>
    </div>
    <div class="flex flex-col gap-y-2">
        <a href="{{ route('Instansi.Index') }}">
            <button class="sidebar-button{{ (Route::is('Instansi.*')) ? '-actived'  : '' }} gap-x-3">
                <img class="mb-0.5" src="/webdevelp/icons/vector_houses.svg">
                <p>Daftar Instansi</p>
            </button>
        </a>
    </div>
    <form action="/logout-account" class="grow flex flex-col justify-end" method="POST">
        @csrf
        <button type="submit" class="group cursor-pointer p-0.5 w-[234px] h-[38px] bg-gradient-to-br rounded-md from-[#6889FF] to-[#8F31B0] flex justify-center items-center">
            <div class="group-hover:bg-transparent w-full h-full gap-x-1 bg-3A3838 rounded-md flex flex-row justify-center items-center">
                <img src="\webdevelp\icons\logout_admin.svg">
                <p class="font-light text-[13px] text-white">Log Out Account</p>
            </div>
        </button>
    </form>
