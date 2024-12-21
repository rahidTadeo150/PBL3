<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Landing Page | Lobi Poliwangi</title>
</head>

<body class="font-Poppins bg-[#f5f5f5]">
    <div class="w-full h-full"
        style="background-image: url('/webdevelp/image/HeroLandingPage.png'); background-size: cover;">
        <div class="container px-4 mx-auto">
            <div>
                @include('NavigationBar.LandingPageNavbar')
                <section class="flex flex-col items-center justify-between py-16 md:flex-row">
                    <div class="md:w-1/2">
                        <h2 class="mb-2 text-2xl text-white md:text-base ">Pengen Cari Pengalaman Tapi
                            Bingung Dimana?
                        </h2>
                        <h1 class="mb-2 text-4xl font-bold text-white md:text-[40px] ">Explore
                            Pengalamanmu
                            Disini Sekarang!
                        </h1>
                        <p class="mt-4 text-white md:text-sm">Selamat datang di Lobi Poliwangi! Kami
                            hadir sebagai platform yang
                            menyediakan informasi terbaru tentang berbagai peluang beasiswa di dalam dan luar negeri.
                        </p>
                        <a href="">
                            <div
                                class="duration-150 ease-in-out hover:text-blue-600 hover:scale-105 hover:bg-white mt-[50px] w-fit text-[14px] rounded-[3px] text-white border-2 border-white px-[73px] py-[8px]">
                                Jelajahi Sekarang!</div>
                        </a>
                    </div>
                    <div class="md:w-1/2">
                        <img src="\webdevelp\image\ActorHeroLandingPage.png" alt="Hero Image" class="w-full h-auto">
                    </div>
                </section>
            </div>

        </div>
    </div>
    <div class="container mx-auto mt-16">
        <section class="flex flex-col justify-center mx-4 mt-8 gap-y-4 gap-x-10 md:flex-row">
            <div class="flex items-center p-4 bg-white rounded-md shadow-md">
                <div>
                    <p class="font-semibold text-blue-600">Informasi Data</p>
                    <p class="text-2xl font-semibold">Terlengkap</p>
                </div>
                <img src="\webdevelp\image\WorldDatabaseIcon.png" alt="World Database Icon" class="w-20 h-20 ml-4">
            </div>
            <div class="flex items-center p-4 bg-white rounded-md shadow-md">
                <div>
                    <p class="font-semibold text-blue-600">Data Yang</p>
                    <p class="text-2xl font-semibold">Up To Date</p>
                </div>
                <img src="\webdevelp\image\UpToDateIcon.png" alt="Up To Date Icon" class="w-20 h-20 ml-4">
            </div>
            <div class="flex items-center p-4 bg-white rounded-md shadow-md">
                <div>
                    <p class="font-semibold text-blue-600">Cari Informasi</p>
                    <p class="text-2xl font-semibold">Tanpa Biaya</p>
                </div>
                <img src="\webdevelp\image\WorldDatabaseIcon.png" alt="World Database Icon" class="w-20 h-20 ml-4">
            </div>
        </section>

        <section class="mt-20 mb-20">
            <div class="flex flex-col items-center justify-center md:flex-row">
                <div class="flex items-center justify-center p-4 md:w-1/2">
                    <img src="\webdevelp\image\OrangBertanyaTanya.png" alt="Questioning Person"
                        class="w-full lg:w-3/4 h-auto rounded-br-[148px] shadow-md">
                </div>
                <div class="p-4 text-center md:w-1/2 md:text-left">
                    <div class="inline-block px-6 py-2 text-white bg-blue-600 rounded-full">Apa Yang Kami Layankan?
                    </div>
                    <h2 class="mt-4 text-3xl font-bold">Website Informatif Lobi Poliwangi</h2>
                    <p class="mt-2">Kami Melayankan Pempublikasian Informasi Terkait Beasiswa dan lomba yang
                        diselenggarakan oleh berbagai Instansi.</p>
                    <div class="flex justify-center mt-6 space-x-8 md:justify-start">
                        <div class="flex items-center">
                            <img src="\webdevelp\image\DBIcon.png" alt="Database Icon" class="w-12 h-12">
                            <div class="ml-2">
                                <p class="text-2xl font-bold">2000+</p>
                                <p class="text-sm">Total Data Beasiswa dan Lomba</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="\webdevelp\image\BuldingApartIcon.png" alt="Building Icon" class="w-12 h-12">
                            <div class="ml-2">
                                <p class="text-2xl font-bold">50+</p>
                                <p class="text-sm">Total Instansi Yang Mempublikasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="\JavascriptDevelp\AccountDropdown.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>
