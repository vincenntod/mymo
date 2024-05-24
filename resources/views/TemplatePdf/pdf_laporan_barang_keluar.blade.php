<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang Keluar</title>
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
    <h1>Laporan Barang Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $data)
                <tr>
                    <td>{{ $data['kd_barang'] }}</td>
                    <td>{{ $data['nama_barang'] }}</td>
                    <td>{{ $data['jumlah_keluar'] }}</td>
                    <td>{{ $data['tanggal_keluar'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>