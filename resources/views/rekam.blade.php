<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rekam Medis</title>
    @include('layout.head')
    <link href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet" />
</head>

<body class="m-0 font-poppins antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('layout.left-side')
    <!-- end sidenav -->
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- end Navbar -->
        <div class="p-6">
            <div class='w-full rounded-xl bg-white h-fit mx-auto'>
                <div class="p-3">
                    <div class="">
                        <h1 class="font-extrabold text-3xl">Rekam Medis</h1>
                    </div>
                </div>
                <div class="p-2">
                    <div class="overflow-auto">
                        <table id="myTable" class="bg-gray-50 border-2">
                            <thead class="w-full">
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Nama</th>
                                    <th>Dokter</th>
                                    <th>Penyakit</th>
                                    <th>Obat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($rekam as $rekamItem)
                                    <tr class="border-2">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $rekamItem->antrian->pada_tanggal }}</td>
                                        <td>{{ $rekamItem->antrian->pasien->name }}</td>
                                        <td>{{ $rekamItem->antrian->dokter->name }}</td>
                                        <td>{{ $rekamItem->antrian->penyakit }}</td>
                                        <td>{{ $rekamItem->obat }}</td>
                                        <td class="flex space-x-2">
                                            <a href="">
                                                <h1 class="p-2 px-10 text-white hover:text-black bg-yellow-500 rounded-xl text-center">Detail</h1>
                                            </a>
                                            <a href="">
                                                <h1 class="p-2 px-10 text-white hover:text-black bg-blue-500 rounded-xl text-center">Edit</h1>
                                            </a>
                                            <form class="p-2 px-10 text-white hover:text-black bg-red-500 rounded-xl text-center" method="post" action="">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                                            </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable', {
                columnDefs: [{
                    targets: 1, // Index of the 'Date' column
                    render: function(data, type, row) {
                        // Assuming the date is in 'YYYY-MM-DD HH:MM:SS' format
                        var date = new Date(data);
                        return date.toLocaleDateString(); // Format the date as needed
                    },
                }, ],
            });
        });
    </script>
</body>
@include('layout.script')

</html>
