<!DOCTYPE html>
<html lang="en">

<head>
    @include('Template.header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('Template.navbar')
        <!-- Main Sidebar Container -->
        @include('Template.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data transaksi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="card card-info card-outline">
                    <div class="card-body">
                        <div class="mb-3">
                            {{-- <a href="{{ route('create_transaksi') }}" class="btn btn-primary">Tambah transaksi</a> --}}
                            {{-- <a href="{{ route('cetak_barang') }}" class="btn btn-success">Cetak</a> --}}
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Pesanan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Menu</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Pembayaran</th>
                                    {{-- <th>Aksi</th> --}}
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTransaksi as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_pelanggan }}</td>
                                        <td>{{ $item->nama_menu }}</td>
                                        <td>{{ $item->total_harga }}</td>
                                        <td>{{ $item->tanggal_pembayaran }}</td>

                                        {{-- <td>
                                            <a href="{{ route('edit_transaksi', ['id' => $item->id]) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('delete_transaksi', ['id' => $item->id]) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Delete</button>
                                            </form>
                                        </td> --}}
                                        <td>
                                            @if($item->status_order != 'Paid')
                                                <a href="{{ route('payment', ['id' => $item->id]) }}"
                                                class="btn btn-success btn-sm">Bayar</a>
                                            @else
                                                Paid
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        @include('Template.footer')
    </div>
    <!-- ./wrapper -->
    @include('Template.script')
</body>

</html>
