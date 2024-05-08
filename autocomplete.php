<?php
include "library/koneksi.php";
$searchTerm = $_GET['term'];

$sql = "SELECT * FROM barang WHERE nama_barang LIKE '%" . $searchTerm . "%' ORDER BY nama_barang ASC";

$hasil = mysqli_query($conn, $sql);

// while ($row = mysqli_fetch_array($hasil)) {
//     $data[] = $row['nama_barang'];
// }

while ($row = mysqli_fetch_array($hasil)) {
    $data[] = array(
        'label' => $row['nama_barang'],
        'kode_barang' => $row['kode_barang'],
        'nama_barang' => $row['nama_barang'],
        'harga_jual' => $row['harga_jual'],
        'harga_beli' => $row['harga_beli'],
    );
}

// memasukan nilai ke dalam bentuk json_decode
echo json_encode($data);

?>