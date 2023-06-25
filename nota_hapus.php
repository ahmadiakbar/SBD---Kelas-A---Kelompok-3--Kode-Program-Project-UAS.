<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM nota WHERE no_nota='$id' ");

    header("location:notainout.php");

}


?>