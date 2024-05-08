<?php
if ($_GET) {
    switch ($_GET['page']) {
        case '';
            if (!file_exists("main-page.php"))
                die("main page tidak ditemukan");
            include "main-page.php";
            break;

        // data-user
        case 'data-user';
            if (!file_exists("data-user.php"))
                die("main page tidak ditemukan");
            include "data-user.php";
            break;

        // data-user
        case 'user-tambah';
            if (!file_exists("user-tambah.php"))
                die("main page tidak ditemukan");
            include "user-tambah.php";
            break;

        // user-edit
        case 'user-edit';
            if (!file_exists("user-edit.php"))
                die("main page tidak ditemukan");
            include "user-edit.php";
            break;

        // hapus-user
        case 'hapus-user';
            if (!file_exists("hapus-user.php"))
                die("main page tidak ditemukan");
            include "hapus-user.php";
            break;

        // pelanggan-data
        case 'pelanggan-data';
            if (!file_exists("pelanggan-data.php"))
                die("main page tidak ditemukan");
            include "pelanggan-data.php";
            break;

        // pelanggan-tambah
        case 'pelanggan-tambah';
            if (!file_exists("pelanggan-tambah.php"))
                die("main page tidak ditemukan");
            include "pelanggan-tambah.php";
            break;

        // pelanggan-edit
        case 'pelanggan-edit';
            if (!file_exists("pelanggan-edit.php"))
                die("main page tidak ditemukan");
            include "pelanggan-edit.php";
            break;

        // pelanggan-delete
        case 'pelanggan-delete';
            if (!file_exists("pelanggan-delete.php"))
                die("main page tidak ditemukan");
            include "pelanggan-delete.php";
            break;

        // kategori-data
        case 'kategori-data';
            if (!file_exists("kategori-data.php"))
                die("main page tidak ditemukan");
            include "kategori-data.php";
            break;

        // Kategori-tambah
        case 'kategori-tambah';
            if (!file_exists("kategori-tambah.php"))
                die("main page tidak ditemukan");
            include "kategori-tambah.php";
            break;

        // Kategori-tambah
        case 'kategori-edit';
            if (!file_exists("kategori-edit.php"))
                die("main page tidak ditemukan");
            include "kategori-edit.php";
            break;

        // Kategori-hapus
        case 'kategori-hapus';
            if (!file_exists("kategori-hapus.php"))
                die("main page tidak ditemukan");
            include "kategori-hapus.php";
            break;

        // barang-data
        case 'barang-data';
            if (!file_exists("barang-data.php"))
                die("main page tidak ditemukan");
            include "barang-data.php";
            break;

        // barang-tambah
        case 'barang-tambah';
            if (!file_exists("barang-tambah.php"))
                die("main page tidak ditemukan");
            include "barang-tambah.php";
            break;

        // barang-edit
        case 'barang-edit';
            if (!file_exists("barang-edit.php"))
                die("main page tidak ditemukan");
            include "barang-edit.php";
            break;

        // barang-hapus
        case 'barang-hapus';
            if (!file_exists("barang-hapus.php"))
                die("main page tidak ditemukan");
            include "barang-hapus.php";
            break;

        // transaksi
        case 'transaksi';
            if (!file_exists("transaksi.php"))
                die("main page tidak ditemukan");
            include "transaksi.php";
            break;

        // transaksi-temporary-hapus
        case 'transaksi-temporary-hapus';
            if (!file_exists("transaksi-temporary-hapus.php"))
                die("main page tidak ditemukan");
            include "transaksi-temporary-hapus.php";
            break;

        // transaksi-belum-terbayar
        case 'transaksi-belum';
            if (!file_exists("transaksi-belum.php"))
                die("main page tidak ditemukan");
            include "transaksi-belum.php";
            break;

        // transaksi-detail
        case 'transaksi-detail';
            if (!file_exists("transaksi-detail.php"))
                die("main page tidak ditemukan");
            include "transaksi-detail.php";
            break;

        // bayar
        case 'bayar';
            if (!file_exists("bayar.php"))
                die("main page tidak ditemukan");
            include "bayar.php";
            break;

        // invoice
        case 'invoice';
            if (!file_exists("invoice.php"))
                die("main page tidak ditemukan");
            include "invoice.php";
            break;

        // laporan-transaksi
        case 'laporan-transaksi';
            if (!file_exists("laporan-transaksi.php"))
                die("main page tidak ditemukan");
            include "laporan-transaksi.php";
            break;
    }
} else {
    if (!file_exists("main-page.php"))
        die("main page tidak ditemukan");
    include "main-page.php";
}

?>