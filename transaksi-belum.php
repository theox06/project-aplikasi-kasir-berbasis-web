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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <br />
                            <a href="?page=kategori-tambah" class="btn btn-outline-primary btn-block">Tambah <i
                                    class="nav-icon fas fa-plus-square"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Operator</th>
                                        <th>Nama</th>
                                        <th>Grandtotal</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $title = "Transaksi Belum Terbayar";
                                    // memanggil koneksi
                                    include ('library/koneksi.php');

                                    // menampilkan data user
                                    $sql = "SELECT transaksi.no_transaksi AS nota, transaksi.kode_pelanggan, pelanggan.nama_pelanggan, transaksi.grandtotal-(SELECT SUM(jumlah) FROM bayar WHERE no_transaksi = nota) AS grandtotal FROM transaksi
                                    LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
                                    LEFT JOIN bayar ON transaksi.no_transaksi = bayar.no_transaksi
                                    WHERE bayar.terbayar = 't'
                                    GROUP BY transaksi.kode_pelanggan;";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['kode_pelanggan'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $result['kode_pelanggan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_pelanggan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['grandtotal']; ?>
                                            </td>
                                            <td><a href="?page=transaksi-detail&kode=<?php echo $kode ?>"
                                                    class="nav-link"><i class="nav-icon fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kode Operator</th>
                                        <th>Nama</th>
                                        <th>Grandtotal</th>
                                        <th>Hapus</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
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