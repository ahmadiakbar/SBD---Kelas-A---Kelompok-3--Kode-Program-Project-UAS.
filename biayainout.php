<!DOCTYPE html>
<html>
<head>
    <title>SEWA BUKU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <h1>INPUT BIAYA SEWA</h1>
    <form method="POST">
        <div class="form-group">
            <label for="kode_biaya">KODE BIAYA</label>
            <input type="text" class="form-control" name="kode_biaya" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="biaya_sewa">BIAYA SEWA</label>
            <input type="text" class="form-control" name="biaya_sewa" placeholder="Text input">
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
    </form>

    <?php
    include "koneksi.php";
    if (isset($_POST['proses'])) {
        $kode_biaya = $_POST['kode_biaya'];
        $biaya_sewa = $_POST['biaya_sewa'];

        mysqli_query($koneksi, "INSERT INTO biaya__sewa VALUES ('$kode_biaya','$biaya_sewa')");

       
    }
    ?>

    <h1>KODE DAN BIAYA SEWA</h1>
    
    <p></p>
    <table class="table table-striped">
        <tr>
            <th>KODE BIAYA</th>
            <th>BIAYA SEWA</th>
            <th>UPDATE</th>
        </tr>
        <?php
        include 'koneksi.php';

        $view = $koneksi->query("SELECT * FROM biaya__sewa ");

        while ($row = $view->fetch_array()) { ?>
            <tr>
                <td><?= $row['kode_biaya'] ?></td>
                <td><?= $row['biaya_sewa'] ?></td>
                <td>
                    <a href="biaya_sewa_hapus.php?id=<?= $row['kode_biaya'] ?>" onclick="return confirm('yakin ingin menghapus')" class="btn btn-primary">HAPUS</a>
                    <a href="biaya_sewa_edit.php?id=<?= $row['kode_biaya'] ?>" onclick="return confirm('yakin ingin edit')" class="btn btn-primary">EDIT</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
