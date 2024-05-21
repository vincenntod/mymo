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
                            <h1 class="m-0">Tambah Barang</h1>
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
                        <form action="{{ route('store_barang') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                                @if ($errors->has('nama'))
                                    <div class="error">{{ $errors->first('nama') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                                @if ($errors->has('jumlah'))
                                    <div class="error">{{ $errors->first('jumlah') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" required>
                                @if ($errors->has('harga'))
                                    <div class="error">{{ $errors->first('harga') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="stok_barang">Stock Barang</label>
                                <input type="number" name="stok_barang" id="stok_barang" class="form-control" required>
                                @if ($errors->has('stok_barang'))
                                    <div class="error">{{ $errors->first('stok_barang') }}</div>
                                @endif
                            </div>
                            <!-- Tambah field keterangan jika diperlukan -->
                            <!-- <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div> -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
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
