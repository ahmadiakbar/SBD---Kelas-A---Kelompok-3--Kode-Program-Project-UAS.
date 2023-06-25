<!DOCTYPE html>
<html>
<head>
    <title>SEWA BUKU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<div class="container"> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SELAMAT DATANG </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="anggotainout.php">ANGGOTA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="biayainout.php"> BIAYA SEWA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="buku_jenisinout.php"> JENIS BUKU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kasirinout.php"> KASIR</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bukuinout.php"> BUKU </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pinjamaninout.php"> PEMINJAMAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksiinout.php"> TRANSAKSI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="notainout.php"> NOTA</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <h1>JENIS BUKU</h1>
    <form method="POST">
        <div class="form-group">
            <label for="kode_jenis">KODE JENIS</label>
            <input type="text" class="form-control" name="kode_jenis" placeholder="Kode Jenis">
        </div>
        <div class="form-group">
            <label for="jenis_buku">JENIS BUKU</label>
            <input type="text" class="form-control" name="jenis_buku" placeholder="Jenis Buku">
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
    </form>
</div>

<?php
include "koneksi.php";
if (isset($_POST['proses'])) {
    $kode_jenis = $_POST['kode_jenis'];
    $jenis_buku = $_POST['jenis_buku'];

    mysqli_query($koneksi, "INSERT INTO jenis_buku VALUES ('$kode_jenis','$jenis_buku')");

    
}
?>

<div class="container">
    <h1>KODE DAN JENIS BUKU</h1>
    
    <p></p>
    <table class="table table-striped">
        <tr>
            <th>KODE JENIS</th>
            <th>JENIS BUKU</th>
            <th>UPDATE</th>
        </tr>
        <?php
        include 'koneksi.php';
        $view = $koneksi->query("SELECT * FROM jenis_buku ");

        while ($row = $view->fetch_array()) {
            ?>
            <tr>
                <td><?= $row['kode_jenis'] ?></td>
                <td><?= $row['jenis_buku'] ?></td>
                <td>
                    <a href="buku_jenis_hapus.php?id=<?= $row['kode_jenis'] ?>" onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
                    <a href="buku_jenis_edit.php?id=<?= $row['kode_jenis'] ?>" onclick="return confirm('Yakin ingin edit?')">EDIT</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>


