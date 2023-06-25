<!DOCTYPE html>
<html>
<head>
    <title>SEWA BUKU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
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

    <h1>ID DAN NAMA KASIR</h1>
    <form method="POST">
        <div class="form-group">
            <label for="id_kasir">ID KASIR</label>
            <input type="text" class="form-control" name="id_kasir" placeholder="ID Kasir">
        </div>
        <div class="form-group">
            <label for="nama_kasir">NAMA KASIR</label>
            <input type="text" class="form-control" name="nama_kasir" placeholder="Nama Kasir">
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
    </form>
</div>
<?php
include "koneksi.php";
if (isset($_POST['proses'])) {
    $id_kasir = $_POST['id_kasir'];
    $nama_kasir = $_POST['nama_kasir'];

    mysqli_query($koneksi, "INSERT INTO kasir VALUES ('$id_kasir','$nama_kasir')");

}
?>


<div class="container">
    <h1>ID DAN NAMA KASIR</h1>
   
    <p></p>
    <table class="table table-striped">
        <tr>
            <th>ID KASIR</th>
            <th>NAMA KASIR</th>
            <th>UPDATE</th>
        </tr>
        <?php
        include 'koneksi.php';
        $view = $koneksi->query("SELECT * FROM kasir ");

        while ($row = $view->fetch_array()) {
            ?>
            <tr>
                <td><?= $row['id_kasir'] ?></td>
                <td><?= $row['nama_kasir'] ?></td>
                <td>
                    <a href="kasir_hapus.php?id=<?= $row['id_kasir'] ?>" onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
                    <a href="kasir_edit.php?id=<?= $row['id_kasir'] ?>" onclick="return confirm('Yakin ingin edit?')">EDIT</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>


