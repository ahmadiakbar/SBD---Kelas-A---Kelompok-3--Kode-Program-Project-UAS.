<?php 

include 'koneksi.php';
if (isset($_GET['id'])){

    $id = $_GET ['id'];

    mysqli_query($koneksi, "DELETE FROM kasir WHERE id_kasir='$id' ");

    header("location:kasirinout.php");

}


?>