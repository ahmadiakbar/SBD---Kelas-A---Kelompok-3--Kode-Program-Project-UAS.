<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM pinjaman WHERE no_peminjaman='$id' ");

    header("location:pinjamaninout.php");

}


?>