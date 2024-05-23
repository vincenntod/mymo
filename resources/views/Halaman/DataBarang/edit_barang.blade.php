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
                            <h1 class="m-0">Edit Barang</h1>
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
                        <form action="{{ route('update_barang',['id' => $barang->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kd_barang">Kode Barang</label>
                                <input type="text" name="kd_barang" id="kd_barang" class="form-control" value={{$barang->kd_barang}} required>
                                @if ($errors->has('kd_barang'))
                                    <div class="error">{{ $errors->first('kd_barang') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value={{$barang->nama_barang}} required>
                                @if ($errors->has('nama_barang'))
                                    <div class="error">{{ $errors->first('nama_barang') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="stock">Jumlah Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control" value={{$barang->stock}} required>
                                @if ($errors->has('stock'))
                                    <div class="error">{{ $errors->first('stock') }}</div>
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
