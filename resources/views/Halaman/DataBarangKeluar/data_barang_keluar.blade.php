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
                            <h1 class="m-0">Data Barang Keluar</h1>
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
                            {{-- <a href="{{ route('create_data_barang_keluar') }}" class="btn btn-primary">Tambah Stock</a> --}}
                            {{-- <a href="{{ route('cetak_barang') }}" class="btn btn-success">Cetak</a> --}}
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataBarangKeluar as $item)
                                    <tr>
                                        <td>{{ $item->kd_barang }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->tanggal_keluar }}</td>
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