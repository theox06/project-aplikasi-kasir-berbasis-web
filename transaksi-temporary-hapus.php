<?php
include ('library/koneksi.php');

$kode = $_GET['kode'];

$query = "DELETE FROM transaksi_tmp WHERE id = '$kode' ";
$input = mysqli_query($conn, $query);

if ($input) {
    // header("location:?page=data-user");
    echo "<meta http-equiv='refresh' content='0;url=index.php?page=transaksi'>";
} else {
    header("location:?page=kategori-tambah");
}
?>