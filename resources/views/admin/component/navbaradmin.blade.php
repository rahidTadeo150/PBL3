{{-- navbar --}}
<div class="fixed z-50 w-full h-16 bg-white">
    <div class="flex flex-row items-center justify-between h-full px-4 md:gap-x-6">


        {{-- logo --}}
        <div class="flex items-center justify-center">
            {{-- hamburger menu --}}
            <div class="flex items-center justify-center p-1 rounded-lg md:hidden bg-slate-700">
                <button id="hamburger" class="text-white focus:outline-none">
                    <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                    <svg id="cross-icon" class="hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <img src="\webdevelp\logolobi\Logo-Lobi-01.png" alt="Logo">

        </div>

        {{-- searching --}}
        <div
            class="hidden grow max-w-[766px] h-[34px] px-3 gap-x-3 md:flex flex-row items-center bg-E2DFDF rounded-[4px]">
            <img src="\webdevelp\icons\find-magnifier-search-zoom-look-svgrepo-com.svg" alt="">
            <form action="" class="w-full">
                @csrf
                <input type="search" class="w-full text-sm italic font-light bg-transparent focus:outline-none"
                    placeholder="Search in here">
            </form>
        </div>

        <div class="flex flex-row items-center gap-x-2 ">
            <a href="/notification-request">
                <button class="p-[8px] rounded-full hover:bg-slate-200">
                    <img class="w-[22px] h-[17px]" src="\webdevelp\icons\icon _Envelope_.svg" alt="">
                </button>
            </a>
            <div class="flex flex-row items-center gap-x-4">
                <div class="w-[42px] h-[42px] overflow-hidden rounded-full">
                    <img class="w-full h-full" src="DefaultDatas\BeasiswaInstansi\DefaultProfiles.jpg" alt="">
                </div>
                <div>
                    <p class="text-[10px] font-semibold">Admin Lobi Poliwangi</p>
                    <p class="font-light italic text-[10px]">User Id: 1</p>
                </div>
            </div>
        </div>
    </div>


</div>
