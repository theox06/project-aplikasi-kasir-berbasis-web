<?php
// aktifasi session
session_start();

// koneksi database
include 'library/koneksi.php';

// mengambil data form
$username = $_POST['username'];
$password = $_POST['password'];

// mencari data user dan password
$query = mysqli_query($conn, "SELECT * FROM operator WHERE username='$username' AND password='$password'");

// menjumlah data yang ditemukan
$check = mysqli_num_rows($query);

// query data hak akses
$login = mysqli_fetch_assoc($query);

// menampilkan data operator
$query = mysqli_query($conn, "SELECT * FROM operator WHERE username='$username' AND password='$password'");
$result = mysqli_fetch_array($query);
$kode_operator = $result['kode_operator'];

// cek apakah user dan password sesuai?
if ($check > 0) {
    //jika user sesuai
    if ($login['hak_akses'] == "admin") {
        // membaca kode operator di query
        // session login username dan hak akses
        $_SESSION['kode_operator'] = $kode_operator;
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = $login['hak_akses'];
        header("Location:index.php");
    } else if ($login['hak_akses'] == "owner") {
        // membaca kode operator di query
        $result = mysqli_fetch_array($query);
        // session login username dan hak akses
        $_SESSION['kode_operator'] = $kode_operator;
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = $login['hak_akses'];
        header("Location:owner.php");
    } else if ($login['hak_akses'] == "operator") {
        // membaca kode operator di query
        $result = mysqli_fetch_array($query);
        // session login username dan hak akses
        $_SESSION['kode_operator'] = $kode_operator;
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = $login['hak_akses'];
        header("Location:operator.php");
    }

} else {
    header("Location:login.php");
}
?>