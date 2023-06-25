<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM jenis_buku WHERE kode_jenis='$id' ");

    header("location:buku_jenisinout.php");

}


?>