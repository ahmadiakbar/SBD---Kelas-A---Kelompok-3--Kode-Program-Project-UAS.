<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $kode_jenis = $_POST['kode_jenis'];
    $jenis_buku = $_POST['jenis_buku'];
   

    $query = "UPDATE jenis_buku SET kode_jenis='$kode_jenis', jenis_buku='$jenis_buku' WHERE kode_jenis='$id'";

    if ($koneksi->query($query) === TRUE) {
        echo "Data anggota berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();

    Header("location:buku_jenisinout.php");
}
?>
