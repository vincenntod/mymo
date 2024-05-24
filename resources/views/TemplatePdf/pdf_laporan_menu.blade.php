<!DOCTYPE html>
<html>
<head>
    <title>Laporan Menu</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Laporan Menu</h1>
    <table>
        <thead>
            <tr>
                <th>Kode Menu</th>
                <th>Nama Menu</th>
                <th>Jumlah Terjual</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesananPelanggan as $item)
                <tr>
                    <td>{{ $item['kd_menu'] }}</td>
                    <td>{{ $item['nama_menu'] }}</td>
                    <td>{{ $item['jumlah_terjual'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>