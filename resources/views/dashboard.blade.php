<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    @include('layout.head')
</head>

<body class="m-0 font-poppins antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('layout.left-side')
    <!-- end sidenav -->
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- end Navbar -->
        <div class="p-6 space-y-2">
            <div class='w-full h-fit mx-auto'>
                <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2 gap-4 p-2">
                    <!-- card1 -->
                    <a href="{{ route('antrian') }}">
                        <div class="bg-blue-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold"></h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Antrian</h1>
                        </div>
                    </a>
                    <!-- card2 -->
                    <a href="">
                        <div class="bg-red-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold"></h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Rekam Medis</h1>
                        </div>
                    </a>
                    @if (auth()->user()->level == 'admin')
                    <!-- card2 -->
                    <a href="{{ route('dokter') }}">
                        <div class="bg-yellow-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold"></h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Dokter</h1>
                        </div>
                    </a>
                    <!-- card2 -->
                    <a href="{{ route('pasien') }}">
                        <div class="bg-green-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold"></h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Pasien</h1>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            <!-- chart -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 ">
                @if (auth()->user()->level == 'admin')
                <!-- chart 1-->
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Dokter</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikPost" width="100" height="50"></canvas>
                </div>
                <!-- chart 2-->
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Pasien</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikProject" width="100" height="50"></canvas>
                </div>
                @endif
                 <!-- chart 3-->
                 <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Antrian</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikProject" width="100" height="50"></canvas>
                </div>
                 <!-- chart 4-->
                 <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Rekam Medis</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikProject" width="100" height="50"></canvas>
                </div>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
@include('layout.script')
</html>
