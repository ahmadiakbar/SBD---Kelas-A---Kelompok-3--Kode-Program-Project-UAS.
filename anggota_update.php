<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $no_anggota = $_POST['no_anggota'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE anggota SET no_anggota='$no_anggota', nama='$nama', telepon='$telepon', alamat='$alamat' WHERE no_anggota='$no_anggota'";

    if ($koneksi->query($query) === TRUE) {
        echo "Data anggota berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();

    Header("location:anggotainout.php");
}
?>
