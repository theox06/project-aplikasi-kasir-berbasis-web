<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Horizontal Form</h3>
                        </div>
                        <link rel="stylesheet"
                            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
                        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="transaksi-temporary.php" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <script>
                                            $(function () {
                                                $("#nama").autocomplete({
                                                    source: 'autocomplete.php',

                                                    select: function (event, ui) {
                                                        $('[name="nama"]').val(ui.item.nama);
                                                        $('[name="kode_barang"]').val(ui.item.kode_barang);
                                                        $('[name="nama_barang"]').val(ui.item.nama_barang);
                                                        $('[name="harga_jual"]').val(ui.item.harga_jual);
                                                        $('[name="harga_beli"]').val(ui.item.harga_beli);
                                                    }
                                                });
                                            });
                                        </script>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama Barang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                                            placeholder="harga_jual" readonly>
                                        <?php
                                        // koneksi database
                                        include 'library/koneksi.php';

                                        $query = mysqli_query($conn, "SELECT max(no_transaksi) as kodeterakhir FROM transaksi");
                                        $isi = mysqli_fetch_array($query);
                                        $Kode = $isi['kodeterakhir'];

                                        $KodeOtomatis = (int) substr($Kode, 2, 8);
                                        $KodeOtomatis++;

                                        $KodeData = "TR";
                                        $Kode = $KodeData . sprintf("%08s", $KodeOtomatis);
                                        ?>
                                        <input type="text" readonly class="form-control" id="no_transaksi"
                                            name="no_transaksi" value="<?php echo $Kode; ?>" placeholder="no_transaksi">
                                        <input type="hidden" class="form-control" id="kode_barang" name="kode_barang"
                                            placeholder="kode barang">
                                        <input type="hidden" class="form-control" id="nama_barang" name="nama_barang"
                                            placeholder="nama_barang">
                                        <input type="hidden" class="form-control" id="harga_beli" name="harga_beli"
                                            placeholder="Harga Beli">
                                        <?php
                                        // aktivasi session php
                                        // session_start();
                                        // session nama
                                        $kode_operator = $_SESSION['kode_operator'];
                                        ?>
                                        <input type="hidden" class="form-control" id="kode_operator"
                                            name="kode_operator" value="<?php echo $kode_operator; ?>"
                                            placeholder="Kode Operator">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Sign in</button>
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Simple Full Width Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Pelanggan</td>
                                        <td>
                                            <select class="custom-select rounded-0" name="kode_pelanggan"
                                                id="exampleSelectRounded0">
                                                <option value="kosong">...</option>
                                                <?php
                                                $kode_pelanggan = "";
                                                // menampilkan data user
                                                $sql = "SELECT * FROM pelanggan";
                                                $query = mysqli_query($conn, $sql);
                                                while ($result = mysqli_fetch_array($query)) {
                                                    $kode = $result['kode_pelanggan'];
                                                    if ($kode_pelanggan == $kode) {
                                                        $cek = "selected";
                                                    } else {
                                                        $cek = "";
                                                    }
                                                    echo "<option value = '$result[kode_pelanggan]' $cek> $result[nama_pelanggan] </option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Jenis Pembayaran</td>
                                        <td>
                                            <select class="custom-select rounded-0" name="jenis_bayar"
                                                id="exampleSelectRounded0">
                                                <option value="belum">Belum</option>
                                                <option value="cash">Cash</option>
                                                <option value="transfer">Transfer</option>
                                                <option value="debit">Debit</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        // include 'library/koneksi.php';
                                        // menampilkan data jumlah barang
                                        $query = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlah_barang FROM transaksi_tmp");
                                        $result = mysqli_fetch_array($query);
                                        $jumlah_barang = $result['jumlah_barang'];
                                        ?>
                                        <td>3.</td>
                                        <td>Jumlah Barang</td>
                                        <td>
                                            <?php echo $jumlah_barang; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                        // menampilkan data grandtotal
                                        $query = mysqli_query($conn, "SELECT SUM(jumlah*harga_jual) AS grandtotal FROM transaksi_tmp");
                                        $result = mysqli_fetch_array($query);
                                        $grandtotal = $result['grandtotal'];
                                        ?>
                                        <td>4.</td>
                                        <td>Grandtotal</td>
                                        <td>
                                            <input type="text" class="form-control" id="grandtotal" name="grandtotal"
                                                value="<?php echo $grandtotal; ?>" placeholder="Jumlah Bayar" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Jumlah Bayar</td>
                                        <td>
                                            <input type="text" class="form-control" id="jumlah_bayar"
                                                name="jumlah_bayar" placeholder="jumlah_bayar">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </form>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Fixed Header Table</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $title = "Transaksi";
                                    // memanggil koneksi
                                    // include ('library/koneksi.php');
                                    
                                    // menampilkan data transaksi tmp
                                    $sql = "SELECT transaksi_tmp.id, transaksi_tmp.kode_barang, barang.nama_barang, transaksi_tmp.harga_beli, transaksi_tmp.harga_jual, transaksi_tmp.jumlah, transaksi_tmp.subtotal, transaksi_tmp.kode_operator, operator.nama FROM transaksi_tmp
                                    LEFT JOIN barang ON transaksi_tmp.kode_barang = barang.kode_barang
                                    LEFT JOIN operator ON transaksi_tmp.kode_barang = operator.kode_operator";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                        $kode = $result['id'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $result['kode_barang']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_barang']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['harga_jual']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['jumlah']; ?>
                                            </td>
                                            <td>
                                                <?php echo $result['subtotal']; ?>
                                            </td>
                                            <td>
                                                <a href="?page=transaksi-temporary-hapus&kode=<?php echo $kode ?>"
                                                    class="nav-link"><i class="nav-icon fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="?page=laporan-transaksi" class="nav-link">Laporan Transaksi
                                    hari ini (F5) </a></h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->