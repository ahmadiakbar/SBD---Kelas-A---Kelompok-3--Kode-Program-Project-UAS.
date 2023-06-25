<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $kode_biaya = $_POST['kode_biaya'];
    $biaya_sewa = $_POST['biaya_sewa'];
 

    $query = "UPDATE biaya__sewa SET kode_biaya='$kode_biaya', biaya_sewa='$biaya_sewa' WHERE kode_biaya='$kode_biaya'";

    if ($koneksi->query($query) === TRUE) {
        echo "Data anggota berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();

    Header("location:biayainout.php");
}
?>
