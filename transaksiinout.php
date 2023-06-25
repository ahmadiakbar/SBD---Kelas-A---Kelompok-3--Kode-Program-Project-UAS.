<!DOCTYPE html>
<html>
<head>
    <title>SEWA BUKU</title>
    <div class="container">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
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

    <h2>INPUT TRANSAKSI</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="no_transaksi">NO TRANSAKSI</label>
            <input type="text" class="form-control" name="no_transaksi" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="no_peminjaman">NO PEMINJAMAN</label>
            <select class="form-control" id="no_peminjaman" name="no_peminjaman">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                $query = "SELECT * FROM pinjaman";
                $result = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['no_peminjaman'] . "'>" . $row['no_peminjaman'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_meminjam">TANGGAL TRANSAKSI</label>
            <input type="date" class="form-control" name="tanggal_meminjam" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="total">BIAYA</label>
            <input type="number" class="form-control" name="total" placeholder="Text input">
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
    </form>

    <?php
    include "koneksi.php";
    if(isset($_POST['proses'])){
        $no_transaksi = $_POST['no_transaksi'];
        $no_peminjaman = $_POST['no_peminjaman'];
        $tanggal_transaksi = $_POST['tanggal_meminjam'];
        $total = $_POST['total'];

        mysqli_query($koneksi,"INSERT INTO transaksi VALUES ('$no_transaksi','$no_peminjaman','$tanggal_transaksi','$total')");

        
    }
    ?>

    <?php
    include 'koneksi.php';
    $view = $koneksi->query("SELECT * FROM transaksi ");
    ?>

    <h2>TABEL TRANSAKSI</h2>
    
    <p></p>
    <table class="table table-striped">
        <tr>
            <th>NO TRANSAKSI</th>
            <th>NO PEMINJAMAN</th>
            <th>TANGGAL TRANSAKSI</th>
            <th>BIAYA</th>
            <th>UPDATE</th>
        </tr>
        <?php
        while ($row = $view->fetch_array()){
            ?>
            <tr>
                <td><?=$row['no_transaksi']?></td>
                <td><?=$row['no_peminjaman']?></td>
                <td><?=$row['tanggal_meminjam']?></td>
                <td><?=$row['total']?></td>
                <td>
                    <a href="transaksi_hapus.php?id=<?=$row['no_transaksi']?>" onclick="return confirm('Yakin ingin menghapus?')">HAPUS</a>
                    <a href="transaksi_edit.php?id=<?=$row['no_transaksi']?>" onclick="return confirm('Yakin ingin mengedit?')">EDIT</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>
