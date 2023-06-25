<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $no_nota = $_POST['no_nota'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $jaminan = $_POST['jaminan'];
    $id_kasir = $_POST['nama_kasir'];
    $no_anggota = $_POST['nama'];
    $no_transaksi = $_POST['total'];

    $query = "UPDATE nota SET no_nota='$no_nota', tanggal_peminjaman='$tanggal_peminjaman', tanggal_kembali='$tanggal_kembali', jaminan='$jaminan', id_kasir='$id_kasir', no_anggota='$no_anggota', no_transaksi='$no_transaksi' WHERE no_nota='$no_nota'";

    if ($koneksi->query($query) === TRUE) {
        echo "Data anggota berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();

    Header("location:notainout.php");
}
?>
