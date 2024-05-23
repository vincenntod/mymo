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
                            <h1 class="m-0">Edit Menu</h1>
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
                        <form action="{{ route('update_menu',['id' => $menu->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kd_menu">Kode Menu</label>
                                <input type="text" name="kd_menu" id="kd_menu" class="form-control" value={{$menu->kd_menu}} required>
                            </div>
                            <div class="form-group">
                                <label for="kd_barang" class="form-label">List Barang</label>
                                @foreach($barang as $barangs)
                                @if(in_array($barangs->kd_barang, explode(',',$menu->kd_barang)))
                                    <?php $checked = "checked"; ?>
                                @else 
                                    <?php $checked = ""?>
                                @endif
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="kd_barang" name="kd_barang[]"  value="{{$barangs->kd_barang}}" {{$checked}}>
                                <label class="form-check-label" for="sparepart">
                                {{$barangs->nama_barang}}
                                </label>
                            </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="nama_menu">Nama Menu</label>
                                <input type="text" name="nama_menu" id="nama_menu" class="form-control" value={{$menu->nama_menu}} required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" value={{$menu->harga}} required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" value={{$menu->keterangan}} required>
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
