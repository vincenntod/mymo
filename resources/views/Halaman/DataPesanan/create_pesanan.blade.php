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
                            <h1 class="m-0">Tambah pesanan</h1>
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
                        <form action="{{ route('store_pesanan') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kd_menu" class="form-label">Menu Yang Di Pesan</label>
                                @foreach($menu as $menus)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="kd_menu" name="kd_menu[]" value="{{$menus->kd_menu}}">
                                        <label class="form-check-label" for="kd_menu">
                                            [{{$menus->kd_menu}}] - {{$menus->nama_menu}} 
                                        </label>
                                        <br>
                                        <label class="form-check-label" for="kd_menu">
                                            Jumlah
                                        </label>
                                        <input type="number" name="jumlahitem[]" class="jumlahitem" data-price="<?= $price =str_replace('.', '', $menus->harga); ?>" id="jumlah_item" value=0>
                                    </div>
                                @endforeach
                            </div>
                            <a href="#" class="btn btn-success" id="hitung"> Cek Harga </a>
                            <!-- Tambah field keterangan jika diperlukan -->
                            <!-- <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div> -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="totalamount"></a>
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
<script type="text/javascript">
    $(document).ready(function(){
        let harga = [];

        $(".jumlahitem").on("change", function(){
            const jml = $(this).val();
            const price = $(this).data('price');
            const total = jml * price;
            
            const index = $(".jumlahitem").index(this);
            harga[index] = total;
        });

        $("#hitung").on('click', function(event){
            event.preventDefault();
            let total = harga.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            $(".totalamount").text('Total Harga: ' + total);
        });
    });
</script>
