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
    
    <?php
    include "koneksi.php";
    if (isset($_POST['proses'])) {
        $no_nota = $_POST['no_nota'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $jaminan = $_POST['jaminan'];
        $id_kasir = $_POST['nama_kasir'];
        $no_anggota = $_POST['nama'];
        $no_transaksi = $_POST['no_transaksi'];

        mysqli_query($koneksi, "INSERT INTO nota VALUES ('$no_nota','$tanggal_peminjaman', '$tanggal_kembali', '$jaminan','$id_kasir','$no_anggota','$no_transaksi')");

       
    }
    ?>

    <h1>INPUT NOTA</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="no_nota">NO NOTA</label>
            <input type="text" class="form-control" name="no_nota" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="tanggal_peminjaman">TANGGAL TRANSAKSI</label>
            <input type="date" class="form-control" name="tanggal_peminjaman" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="tanggal_kembali">TANGGAL KEMBALI</label>
            <input type="date" class="form-control" name="tanggal_kembali" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="jaminan">JAMINAN</label>
            <input type="text" class="form-control" name="jaminan" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="id_kasir">ID KASIR</label>
            <select class="form-control" id="id_kasir" name="nama_kasir">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                $query = "SELECT * FROM kasir";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id_kasir'] . "'>" . $row['nama_kasir'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="no_anggota">NO ANGGOTA</label>
            <select class="form-control" id="no_anggota" name="nama">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                $query = "SELECT * FROM anggota";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['no_anggota'] . "'>" . $row['nama'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="no_transaksi">NO TRANSAKSI</label>
            <select class="form-control" id="no_transaksi" name="no_transaksi">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                $query = "SELECT * FROM transaksi";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['no_transaksi'] . "'>" . $row['no_transaksi'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
    </form>

    <?php
    include 'koneksi.php';
    $view = $koneksi->query("SELECT * FROM nota ");
    ?>

    <h1>DATA NOTA</h1>
    <table class="table table-striped">
        <tr>
            <th>NO NOTA</th>
            <th>TANGGAL TRANSAKSI</th>
            <th>TANGGAL KEMBALI</th>
            <th>JAMINAN</th>
            <th>ID KASIR</th>
            <th>NO ANGGOTA</th>
            <th>NO TRANSAKSI</th>
            <th>UPDATE</th>
        </tr>
        <?php
        while ($row = $view->fetch_array()) { ?>
            <tr>
                <td><?= $row['no_nota'] ?></td>
                <td><?= $row['tanggal_peminjaman'] ?></td>
                <td><?= $row['tanggal_kembali'] ?></td>
                <td><?= $row['jaminan'] ?></td>
                <td><?= $row['id_kasir'] ?></td>
                <td><?= $row['no_anggota'] ?></td>
                <td><?= $row['no_transaksi'] ?></td>
                <td>
                    <a href="nota_hapus.php?id=<?= $row['no_nota'] ?>" onclick="return confirm ('yakin ingin menghapus')">HAPUS</a>
                    <a href="nota_edit.php?id=<?= $row['no_nota'] ?>" onclick="return confirm ('yakin ingin edit')">EDIT</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
