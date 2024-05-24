<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
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
    <h1>Laporan Transaksi</h1>
    <table>
        <thead>
            <tr>
                <th>No Transaksi</th>
                <th>No Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Menu yang Dipesan</th>
                <th>Total Harga</th>
                <th>Tanggal Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTransaksi as $item)
                <tr>
                    <td>{{ $item->id_transaksi }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->nama_menu }}</td>
                    <td>{{ $item->total_harga }}</td>
                    <td>{{ $item->tanggal_pembayaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>