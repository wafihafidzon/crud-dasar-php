<?php

$localhost  = "localhost";
$username   = "root";
$password   = "";
$db         = "crud";


@$kirim = $_POST["kirim"];

$koneksi = mysqli_connect($localhost, $username, $password, $db);

if (!$koneksi) {
    die("Database tidak terhubung");
}
// pembuatan create
if (isset($kirim)) {
        $nim        = $_POST['nim'];
        $nama       = $_POST['nama'];
        $domisili   = $_POST['domisili'];
        
        if ($nim && $nama && $domisili) {
        
        $sqli = "INSERT INTO mahasiswa (id, nim, nama, domisili) VALUES (NULL, '$nim', '$nama', '$domisili')";
        $q1 = mysqli_query($koneksi, $sqli);

        if ($q1) {
            $sukses = "Berhasil memasukkan data";
        } else {
            $gagal = "Gagal memasukkan data";
        }
    }else {
        $gagal = "Data yang anda masukkan tidak lengkap";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Mahasiswa</title>
    <style>
        .mx-auto {
            width: 800px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white">Buat / Rubah Data</div>
            <div class="card-body">

                <?php
                if (@$gagal) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= @$gagal ?>
                    </div>
                <?php
                } if (@$sukses) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= @$sukses ?>
                    </div>
                <?php } ?>

                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="nim" id="nim" value="<?= @$nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Domisili</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="domisili" id="domisili" value="<?= @$domisili ?>">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="kirim" name="kirim">
                </form>
            </div>
        </div>
        <!-- untuk menampilkan data -->
        <div class="card">
            <div class="card-header">Data Mahasiswa</div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Domisili</th>
                        </tr>
                    </thead>
                    <tr>
                        <td scope="col"><?= @$nim ?></td>
                        <td scope="col"><?= @$nama ?></td>
                        <td scope="col"><?= @$domisili ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
