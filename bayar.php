<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php
                    // memanggil database
                    include ('library/koneksi.php');

                    $kode = $_GET['kode'];
                    $sql = "SELECT pelanggan.nama_pelanggan FROM transaksi
                            LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
                            LEFT JOIN bayar ON transaksi.no_transaksi = bayar.no_transaksi
                            WHERE transaksi.no_transaksi = '$kode'
                            GROUP BY transaksi.no_transaksi";
                    $query = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_array($query);
                    ?>
                    <h1>
                        <?php echo $result['nama_pelanggan']; ?>
                    </h1>
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
                            <h3 class="card-title">Silahkan mengisi data diri pada form berikut</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        // include ('library/koneksi.php');
                        
                        // menampilkan data user
                        $kode = $_GET['kode'];
                        $sql = "SELECT transaksi.no_transaksi AS nota, transaksi.tanggal, transaksi.kode_pelanggan, pelanggan.nama_pelanggan, transaksi.grandtotal-(SELECT SUM(jumlah) FROM bayar WHERE no_transaksi = nota) AS grandtotal FROM transaksi
                        LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
                        LEFT JOIN bayar ON transaksi.no_transaksi = bayar.no_transaksi
                        WHERE transaksi.no_transaksi = '$kode'
                        GROUP BY transaksi.no_transaksi;";
                        $query = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($query);
                        ?>
                        <form action="transaksi-belum-simpan.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Transaksi</label>
                                    <input type="text" name="no_transaksi" value="<?php echo $row['nota']; ?>"
                                        class="form-control" id="exampleInputEmail1" placeholder="No transaksi">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <input type="text" name="tanggal" value="<?php echo $row['tanggal']; ?>"
                                        class="form-control" id="exampleInputEmail1" placeholder="Tanggal">
                                    <label for="exampleInputEmail1">Jumlah</label>
                                    <input type="text" name="jumlah" value="<?php echo $row['grandtotal']; ?>"
                                        class="form-control" id="exampleInputEmail1" placeholder="Jumlah">
                                    <label for="exampleInputEmail1">Jenis Pembayaran</label>
                                    <select class="custom-select rounded-0" name="jenis_bayar"
                                        id="exampleSelectRounded0">
                                        <option value="belum">Belum</option>
                                        <option value="cash">Cash</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="debit">Debit</option>
                                    </select>
                                    <label for="exampleInputEmail1">bayar</label>
                                    <input type="text" name="bayar" value="" class="form-control"
                                        id="exampleInputEmail1" placeholder="Bayar">
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