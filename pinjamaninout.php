<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
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
    <h1>INPUT PINJAMAN</h1>
    <form method="POST">
        <div class="form-group">
            <label for="no_peminjaman">NO PEMINJAMAN</label>
            <input type="text" class="form-control" name="no_peminjaman" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="tanggal_meminjam">TANGGAL MEMINJAM</label>
            <input type="date" class="form-control" name="tanggal_meminjam" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="tanggal_kembali">TANGGAL KEMBALI</label>
            <input type="date" class="form-control" name="tanggal_kembali" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="kode_buku">KODE BUKU</label>
            <select class="form-control" id="kode_buku" name="judul_buku">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                $query = "SELECT * FROM buku";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['kode_buku'] . "'>" . $row['judul_buku'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
    </form>

    <?php
    include "koneksi.php";
    if(isset($_POST['proses'])){
        $no_peminjaman = $_POST['no_peminjaman'];
        $tanggal_meminjam = $_POST['tanggal_meminjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $kode_buku = $_POST['judul_buku'];

        mysqli_query($koneksi,"INSERT INTO pinjaman VALUES ('$no_peminjaman','$tanggal_meminjam','$tanggal_kembali','$kode_buku')");

       
    }
    ?>

    <h1>TABEL PEMINJAMAN</h1>
  
    <p></p>
    <table class="table table-striped">
        <tr>
            <th>NO PEMINAJAMAN</th>
            <th>TANGGAL MEMINJAM</th>
            <th>TANGGAL KEMBALLI</th>
            <th>KODE BUKU</th>
            <th>UPDATE</th>
        </tr>
        <?php
        $view = $koneksi->query("SELECT * FROM pinjaman ");

        while ($row = $view->fetch_array()) {
            ?>
            <tr>
                <td><?= $row['no_peminjaman'] ?></td>
                <td><?= $row['tanggal_meminjam'] ?></td>
                <td><?= $row['tanggal_kembali'] ?></td>
                <td><?= $row['kode_buku'] ?></td>
                <td>
                    <a href="pinjaman_hapus.php?id=<?= $row['no_peminjaman'] ?>" onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
                    <a href="pinjaman_edit.php?id=<?= $row['no_peminjaman'] ?>" onclick="return confirm('Yakin ingin edit?')">EDIT</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
