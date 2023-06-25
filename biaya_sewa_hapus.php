<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM biaya__sewa WHERE kode_biaya='$id' ");

    header("location:biayainout.php");

}


?>