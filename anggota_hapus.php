<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM anggota WHERE no_anggota='$id' ");

    header("location:anggotainout.php");

}


?>