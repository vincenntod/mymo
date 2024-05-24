<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stock</title>
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
    <h1>Laporan Stock</h1>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $item)
                <tr>
                    <td>{{ $item->kd_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>