<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM transaksi WHERE no_transaksi='$id' ");

    header("location:transaksiinout.php");

}


?>