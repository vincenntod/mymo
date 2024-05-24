<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pesanan Pelanggan</title>
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
    <h1>Laporan Pesanan Pelanggan</h1>
    <table>
        <thead>
            <tr>
                <th>No Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Menu Yang di Pesan</th>
                <th>Status Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPesanan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->nama_menu }}</td>
                    <td>{{ $item->status_order }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>