<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prestasi Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 12px;
            font-weight: bold;
            margin: 20px 0 10px;
        }

        table {
            font-size: 12px;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        td {
            height: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>DATA PRESTASI MAHASISWA<br>TAHUN AKADEMIK 2024/2025</h1>
    <h2>Di bawah ini merupakan rekap prestasi mahasiswa berdasarkan program studi Teknologi Rekayasa Perangkat Lunak</h2>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NAMA</th>
                <th>NIM</th>
                <th>LOMBA</th>
                <th>TANGGAL</th>
                <th>TINGKAT</th>
                <th>PENCAPAIAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->Mahasiswa->nama_mahasiswa }}</td>
                <td>{{ $data->Mahasiswa->nim }}</td>
                <td>{{ $data->prestasi->nama_perlombaan }}</td>
                <td>{{ $data->Prestasi->tanggal_perlombaan }}</td>
                <td>{{ $data->Prestasi->tingkatan->tingkatan }}</td>
                <td>{{ $data->posisi_juara }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
