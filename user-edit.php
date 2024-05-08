<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Silahkan mengisi data diri pada form berikut</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        include ('library/koneksi.php');

                        // menampilkan data user
                        $kode = $_GET['kode'];
                        $sql = "SELECT * FROM operator WHERE kode_operator = '$kode'";
                        $query = mysqli_query($conn, $sql);
                        $edit = mysqli_fetch_array($query);
                        ?>
                        <form action="proses-edit.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="hidden" name="kode_operator"
                                        value="<?php echo $edit['kode_operator']; ?>" class="form-control"
                                        id="exampleInputEmail1" placeholder="Nama" readonly>
                                    <input type="text" name="nama" value="<?php echo $edit['nama']; ?>"
                                        class="form-control" id="exampleInputEmail1" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">alamat</label>
                                    <input type="text" name="alamat" value="<?php echo $edit['alamat']; ?>"
                                        class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">no hp</label>
                                    <input type="text" name="no_hp" class="form-control"
                                        value="<?php echo $edit['no_hp']; ?>" id="exampleInputEmail1"
                                        placeholder="no hp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">username</label>
                                    <input type="text" name="username" value="<?php echo $edit['username']; ?>"
                                        class="form-control" id="exampleInputEmail1" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" value="<?php echo $edit['password']; ?>"
                                        class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Hak Akses</label>
                                    <select class="custom-select rounded-0" name="hak_akses" id="exampleSelectRounded0">
                                        <option value="kosong">...</option>
                                        <?php
                                        $data_akses = $edit['hak_akses'];
                                        // menampilkan data user
                                        $sql = "SELECT * FROM hak_akses";
                                        $query = mysqli_query($conn, $sql);
                                        while ($result = mysqli_fetch_array($query)) {
                                            $hak_akses = $result['nama_akses'];
                                            if ($data_akses == $hak_akses) {
                                                $cek = "selected";
                                            } else {
                                                $cek = "";
                                            }
                                            echo "<option value = '$result[nama_akses]' $cek> $result[nama_akses] </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
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