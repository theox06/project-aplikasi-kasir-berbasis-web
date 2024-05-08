<?php
include ('library/koneksi.php');

// simpan table transaksi

$tanggal_sekarang = date("Y-m-d");

// aktivasi session php
session_start();
// session nama
$kode_operator_session = $_SESSION['kode_operator'];


$no_transaksi = $_POST['no_transaksi'];
$tanggal = $tanggal_sekarang;
$kode_operator = $kode_operator_session;
$grandtotal = $_POST['grandtotal'];

$query = "INSERT INTO transaksi (no_transaksi, tanggal, kode_operator, grandtotal) VALUES ('$no_transaksi', '$tanggal', '$kode_operator', '$grandtotal')";
$input = mysqli_query($conn, $query);

if ($input) {
    // menampilkan data transaksi tmp
    $sql = "SELECT transaksi_tmp.id, transaksi_tmp.kode_barang, barang.nama_barang, transaksi_tmp.harga_beli, transaksi_tmp.harga_jual, transaksi_tmp.jumlah, transaksi_tmp.subtotal, transaksi_tmp.kode_operator, operator.nama FROM transaksi_tmp
LEFT JOIN barang ON transaksi_tmp.kode_barang = barang.kode_barang
LEFT JOIN operator ON transaksi_tmp.kode_barang = operator.kode_operator";
    $query = mysqli_query($conn, $sql);
    while ($result = mysqli_fetch_array($query)) {
        $kode = $result['id'];

        $no_transaksi = $_POST['no_transaksi'];
        $kode_barang = $result['kode_barang'];
        $harga_beli = $result['harga_beli'];
        $harga_jual = $result['harga_jual'];
        $jumlah = $result['jumlah'];
        $subtotal = $result['subtotal'];

        $query = "INSERT INTO transaksi_detail (no_transaksi, kode_barang, harga_beli, harga_jual, jumlah, subtotal) VALUES ('$no_transaksi', '$kode_barang', '$harga_beli', '$harga_jual', '$jumlah', '$subtotal')";
        $input = mysqli_query($conn, $query);

    }
} else {
    header("location:?page=kategori-tambah");
}



?>