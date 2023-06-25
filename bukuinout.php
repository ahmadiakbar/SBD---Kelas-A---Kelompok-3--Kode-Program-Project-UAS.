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

    <h1>BUKU</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="kode_buku">KODE BUKU</label>
            <input type="text" class="form-control" name="kode_buku" placeholder="Kode Buku">
        </div>
        <div class="form-group">
            <label for="judul_buku">JUDUL BUKU</label>
            <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku">
        </div>
        <div class="form-group">
            <label for="jenis_buku">KODE JENIS</label>
            <select class="form-control" id="jenis_buku" name="jenis_buku">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                $query = "SELECT * FROM jenis_buku";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['kode_jenis'] . "'>" . $row['jenis_buku'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="biaya_sewa">BIAYA</label>
            <select class="form-control" id="biaya_sewa" name="biaya_sewa">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                $query = "SELECT * FROM biaya__sewa";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['kode_biaya'] . "'>" . $row['biaya_sewa'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
    </form>
    <?php
include "koneksi.php";
if (isset($_POST['proses'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $kode_jenis = $_POST['jenis_buku'];
    $kode_biaya = $_POST['biaya_sewa'];

    mysqli_query($koneksi, "INSERT INTO buku VALUES ('$kode_buku','$judul_buku','$kode_jenis','$kode_biaya')");

    
}
?>



    <br>
    <table class="table table-striped">
        <tr>
            <th>KODE BUKU</th>
            <th>JUDUL BUKU</th>
            <th>KODE JENIS</th>
            <th>KODE BIAYA</th>
            <th>UPDATE</th>
        </tr>
        <?php
        include 'koneksi.php';
        $view = $koneksi->query("SELECT * FROM buku ");
        while ($row = $view->fetch_array()) { ?>
            <tr>
                <td><?= $row['kode_buku'] ?></td>
                <td><?= $row['judul_buku'] ?></td>
                <td><?= $row['kode_jenis'] ?></td>
                <td><?= $row['kode_biaya'] ?></td>
                <td>
                    <a href="buku_hapus.php?id=<?= $row['kode_buku'] ?>" onclick="return confirm('yakin ingin menghapus')">HAPUS</a>
                    <a href="buku_edit.php?id=<?= $row['kode_buku'] ?>" onclick="return confirm('yakin ingin edit')">EDIT</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>


