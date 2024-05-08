<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Silahkan mengisi data pada form berikut</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        include ('library/koneksi.php');

                        $query = mysqli_query($conn, "SELECT max(kode_barang) as kodeterakhir FROM barang");
                        $isi = mysqli_fetch_array($query);
                        $Kode = $isi['kodeterakhir'];

                        $KodeOtomatis = (int) substr($Kode, 2, 8);
                        $KodeOtomatis++;

                        $KodeData = "BR";
                        $Kode = $KodeData . sprintf("%08s", $KodeOtomatis);
                        ?>
                        <form action="barang-simpan.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Barang</label>
                                    <input type="text" name="kode_barang" value="<?php echo $Kode; ?>"
                                        class="form-control" id="exampleInputEmail1" placeholder="Kode Kategori"
                                        readonly>
                                    <label for="exampleInputEmail1">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Nama Kategori</label>
                                    <select class="custom-select rounded-0" name="kode_kategori"
                                        id="exampleSelectRounded0">
                                        <option value="kosong">...</option>
                                        <?php
                                        $kategori = $edit['kategori'];
                                        // menampilkan data user
                                        $sql = "SELECT * FROM kategori";
                                        $query = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_array($query)) {
                                            $kode_kategori = $result['kode_kategori'];
                                            if ($kategori == $kode_kategori) {
                                                $cek = "selected";
                                            } else {
                                                $cek = "";
                                            }
                                            echo "<option value = '$result[kode_kategori]' $cek> $result[nama_kategori] </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Beli</label>
                                    <input type="text" name="harga_beli" class="form-control" id="exampleInputEmail1"
                                        placeholder="Harga Beli">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Jual</label>
                                    <input type="text" name="harga_jual" class="form-control" id="exampleInputEmail1"
                                        placeholder="Harga Jual">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Stok</label>
                                    <input type="text" name="stok" class="form-control" id="exampleInputEmail1"
                                        placeholder="Stok">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->