<?php 
session_start();
if (!isset($_SESSION['nama'])) {
    header("location:login.php");
}
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM transaksi");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-success">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">PENJUALAN <?= $_SESSION['nama']?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6">
                <a href="create.php" class="btn btn-primary">Tambah Transaksi</a><br>
            </div>
            <div class="col-md-6 bg bg-primary rounded-2 p-2 d-flex justify-content-between">
                <h5 class="text-white">
                    TOTAL PENDAPATAN: 
                </h5>

                <h5 class="text-white">
                   <?php
                   $total = 0;
                   $totall = 0;
                    $total = $data['harga'] * $data['jml_beli'];
                    $totall += $total;
                    echo $totall;
                    ?>
                </h5>
            </div>
        </div>
        Total Data Produk: 2
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>PRODUK</th>
                    <th>JUMLAH BELI</th>
                    <th>HARGA</th>
                    <th>TOTAL HARGA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php 
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM transaksi");
$no = 1;
while ($data = mysqli_fetch_array($query)) {
?>
<tr>
    <td><?= $no ?></td>
    <td><?= $data['tanggal'] ?></td>
    <td><?= $data['produk'] ?></td>
    <td><?= $data['jml_beli'] ?></td>
    <td>Rp. <?= $data['harga']?></td>
    <td>Rp. <?= $data['jml_beli'] * $data['harga'] ?></td>
    <td>
        <a href="delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Yakin hapus data <?= $data['id'] ?>ini?')" class="btn btn-danger">Hapus</a>
        <a href="update.php?id=<?= $data['id'] ?>" class="btn btn-info">Edit</a>
    </td>
</tr>
<?php 
$no++;
}
?>

                <!-- <tr>
                    <td>2</td>
                    <td>11-12-2024</td>
                    <td>Keyboard</td>
                    <td>5</td>
                    <td>Rp. 150.000</td>
                    <td>Rp. 750.000</td>
                    <td>
                        <a href="#" onclick="return window.confirm('Yakin hapus data ini?')" class="btn btn-danger">Hapus</a>
                        <a href="#" class="btn btn-info">Edit</a>
                    </td>
                </tr> -->
                <?php 
                $no++;
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<script src="bootstrap/js/bootstrap.min.js"></script>