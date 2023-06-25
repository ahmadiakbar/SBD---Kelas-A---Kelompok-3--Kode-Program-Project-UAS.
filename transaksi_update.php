<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $no_transaksi = $_POST['no_transaksi'];
    $no_peminjaman = $_POST['no_peminjaman'];
    $tanggal_meminjam = $_POST['tanggal_meminjam'];
    $total = $_POST['total'];

    $query = "UPDATE transaksi SET no_transaksi='$no_transaksi', no_peminjaman='$no_peminjaman', tanggal_meminjam='$tanggal_meminjam', total='$total' WHERE no_transaksi='$no_transaksi'";

    if ($koneksi->query($query) === TRUE) {
        echo "Data anggota berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();

    Header("location:transaksiinout.php");
}
?>
