<?php
include ('library/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                        <small class="float-right">Date: 2/10/2014</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>
                <?php
                // menampilkan data grandtotal
                $kode = $_GET['kode'];
                $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE no_transaksi = '$kode';");
                $result = mysqli_fetch_array($query);
                $tanggal = $result['tanggal'];
                ?>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #
                        <?php echo $kode = $_GET['kode']; ?>
                    </b><br>
                    <br>
                    <b>Order ID:</b>
                    <?php echo $kode = $_GET['kode']; ?><br>
                    <b>Payment Due:</b>
                    <?php echo $tanggal; ?><br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Code #</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $title = "Transaksi";
                            // memanggil koneksi
                            // include ('library/koneksi.php');
                            
                            // menampilkan data transaksi tmp
                            $kode = $_GET['kode'];
                            $sql = "SELECT transaksi_detail.jumlah, barang.nama_barang, transaksi_detail.kode_barang, transaksi_detail.subtotal FROM transaksi_detail
                        LEFT JOIN barang ON transaksi_detail.kode_barang=barang.kode_barang WHERE transaksi_detail.no_transaksi = '$kode'";
                            $query = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_array($query)) {
                                $kode = $result['kode_barang'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $result['jumlah']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['nama_barang']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['kode_barang']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['subtotal']; ?>
                                    </td>
                                </tr>
                                <?php
                                $grandtotal = 0;
                                $subtotal = $result['subtotal'];
                                $grandtotal = $grandtotal + $subtotal;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="dist/img/credit/visa.png" alt="Visa">
                    <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="dist/img/credit/american-express.png" alt="American Express">
                    <img src="dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango
                        imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Grandtotal:</th>
                                <td>
                                    <?php echo $grandtotal; ?>
                                </td>
                            </tr>
                            <?php
                            // menampilkan data grandtotal
                            $kode = $_GET['kode'];
                            $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE no_transaksi = '$kode';");
                            $result = mysqli_fetch_array($query);
                            $jumlah_bayar = $result['jumlah_bayar'];
                            ?>
                            <tr>
                                <th>Jumlah Bayar</th>
                                <td>
                                    <?php echo $jumlah_bayar; ?>
                                </td>
                            </tr>
                            <?php
                            $kembalian = 0;
                            $kembalian = $jumlah_bayar - $grandtotal;
                            ?>
                            <tr>
                                <th>Kembalian:</th>
                                <td>
                                    <?php echo $kembalian; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>