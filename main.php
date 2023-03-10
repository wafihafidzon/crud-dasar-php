<?php
include 'text.php';
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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Menu Restoran Padang</a>
                <form action="index.php" class="d-flex">
                    <input class="btn btn-outline-success" value="Login" type="submit">
                </form>
            </div>
        </nav>
        <table class="table">
            <thead class="table-primary text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <?php
            $qread = "SELECT * FROM menu";
            $q1 = mysqli_query($koneksi, $qread);
            $nomor = 1;
            while ($data = mysqli_fetch_array($q1)) {
            ?>
                <tr class="text-center">
                    <td scope="col"><?= @$nomor++ ?></td>
                    <td scope="col"><?= @$data['menu'] ?></td>
                    <td scope="col"><?= @$data['kategori'] ?></td>
                    <td scope="col">Rp.<?= @$data['harga'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    </div>
    </div>
</body>

</html>