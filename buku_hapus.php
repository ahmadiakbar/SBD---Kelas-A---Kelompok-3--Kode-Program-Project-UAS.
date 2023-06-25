<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku='$id' ");

    header("location:bukuinout.php");

}


?>