<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $id_kasir = $_POST['id_kasir'];
    $nama_kasir = $_POST['nama_kasir'];
    

    $query = "UPDATE kasir SET id_kasir='$id_kasir', nama_kasir='$nama_kasir' WHERE id_kasir='$id_kasir'";

    if ($koneksi->query($query) === TRUE) {
        echo "Data anggota berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();

    Header("location:kasirinout.php");
}
?>
