<script type="text/javascript">
    document.onkeydown = function (teziger) {
        switch (teziger.keyCode) {
            case 112: // kode f1
                teziger.preventDefault(); // berfungsi menghapus default tombol
                window.location = 'http://localhost/project_pkl_5_kasir/?page=pelanggan-data';
                break;
            case 113: // kode f2
                teziger.preventDefault(); // berfungsi menghapus default tombol
                window.location = 'http://localhost/project_pkl_5_kasir/?page=transaksi-belum';
                break;
            case 114: // kode f3
                teziger.preventDefault(); // berfungsi menghapus default tombol
                window.location = 'http://localhost/project_pkl_5_kasir/?page=transaksi';
                break;
            case 115: // kode f4
                teziger.preventDefault(); // berfungsi menghapus default tombol
                window.location = 'http://localhost/project_pkl_5_kasir/?page=laporan-transaksi';
                break;
            case 116: // kode f5
                teziger.preventDefault(); // berfungsi menghapus default tombol
                window.location = 'http://localhost/project_pkl_5_kasir/index.php';
                break;
        }
    }
</script>