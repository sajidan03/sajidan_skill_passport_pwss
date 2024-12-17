<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM transaksi where id ='$id'");
    if ($query) {
        header("location:index.php");
    }
}
?>