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

                    $sql = "SELECT * FROM pelanggan
                    WHERE kode_pelanggan='$kode';";
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
                                        <th>No Transaksi</th>
                                        <th>Grandtotal</th>
                                        <th>Terbayar</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $title = "Transaksi Belum Terbayar";
                                    // memanggil koneksi
                                    

                                    // menampilkan data user
                                    $kode = $_GET['kode'];
                                    $sql = "SELECT transaksi.no_transaksi AS nota, transaksi.kode_pelanggan, pelanggan.nama_pelanggan, transaksi.grandtotal, transaksi.grandtotal-(SELECT SUM(jumlah) FROM bayar WHERE no_transaksi = nota) AS jumlah FROM transaksi
                                            LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
                                            LEFT JOIN bayar ON transaksi.no_transaksi = bayar.no_transaksi
                                            WHERE bayar.terbayar = 't'
                                            GROUP BY transaksi.no_transaksi;";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['nota'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $result['nota']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['grandtotal']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['jumlah']; ?>
                                            </td>
                                            <td><a href="?page=bayar&kode=<?php echo $kode; ?>" class="nav-link"><i
                                                        class="nav-icon fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>Grandtotal</th>
                                        <th>Terbayar</th>
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