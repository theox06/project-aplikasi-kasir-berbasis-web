<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'pkl_kasir');

$conn = mysqli_connect(HOST, USER, PASS, DB) or die ('unable to connect');

// if ($conn) {
//     echo "berhasil";
// } else {
//     echo "gagal";
// }
?>