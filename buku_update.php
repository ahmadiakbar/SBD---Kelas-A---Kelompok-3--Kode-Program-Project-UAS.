<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $kode_jenis = $_POST['jenis_buku'];
    $kode_biaya = $_POST['biaya_sewa'];

    $query = "UPDATE buku SET kode_buku='$kode_buku', judul_buku='$judul_buku', kode_jenis='$kode_jenis', kode_biaya='$kode_biaya' WHERE kode_buku='$kode_buku'";

    if ($koneksi->query($query) === TRUE) {
        echo "Data anggota berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();

    Header("location:bukuinout.php");
}
?>
