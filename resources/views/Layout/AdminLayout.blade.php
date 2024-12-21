<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Form Pengisian Data Instansi | Lobi Poliwangi</title>
</head>

<body class=" font-Poppins">
    {{-- navbar --}}
    @include('admin.component.navbaradmin')
    <div class="flex h-screen overflow-hidden">

        {{-- sidebar --}}
        @include('admin.component.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 h-full pt-16 pb-6 pl-4 pr-4 overflow-y-auto bg-slate-100 md:mt-16 md:pt-0 md:pl-8 md:pr-8">
            @yield('Content')
        </div>
    </div>
    <script>
        feather.replace();
    </script>
    <script src="{{ asset('JavascriptDevelp/hamberger.js') }}"></script>
</body>

</html>
