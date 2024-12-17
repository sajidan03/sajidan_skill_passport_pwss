<?php 
session_start();
if (!isset($_SESSION['nama'])) {
    header("location:login.php");
}
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query2 = mysqli_query($koneksi, "SELECT * FROM transaksi where id = '$id'");
    $data = mysqli_fetch_assoc($query2);
}
?>
<?php
    include'koneksi.php';
    if (isset($_POST['tambah'])) {
        $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
        $produk = mysqli_escape_string($koneksi, $_POST['produk']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
        $jml = mysqli_real_escape_string($koneksi, $_POST['jml_beli']);
        $query = mysqli_query($koneksi, "UPDATE transaksi set tanggal = '$tanggal', produk = '$produk', harga ='$harga', jml_beli = '$jml'");
        if ($query) {
            header("location:index.php");
            exit();
        }
    }
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
            <a href="#" class="navbar-brand">PENJUALAN (Nama pengguna yang login)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        Form Transaksi
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group pt-2">
                                <label for="productName">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="date" placeholder="Masukkan tanggal" name="tanggal" value="<?= $data['tanggal']?>">
                            </div>
                            <div class="form-group pt-2">
                                <label for="productName">Nama Produk</label>
                                <input type="text" class="form-control" id="productName" placeholder="Masukkan nama produk" name="produk" value="<?= $data['produk']?>">
                            </div>
                            <div class="form-group pt-2">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" placeholder="Masukkan harga produk" name="harga" value="<?= $data['harga']?>">
                            </div>
                            <div class="form-group pt-2">
                                <label for="quantity">Jumlah Beli</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Masukkan jumlah produk" name="jml_beli" value="<?= $data['jml_beli']?>">
                            </div>
                            <button type="submit" class="btn btn-secondary w-100 btn-block mt-5" name="tambah">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="bootstrap/js/bootstrap.min.js"></script>