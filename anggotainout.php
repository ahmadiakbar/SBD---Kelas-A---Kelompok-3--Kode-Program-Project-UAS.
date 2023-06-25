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


    <h1>INPUT ANGGOTA</h1>
    <form method="POST" action="">
     <div class="form-group">
            <label for="no_anggota">NO ANGGOTA</label>
            <input type="text" class="form-control" name="no_anggota" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="nama">NAMA</label>
            <input type="text" class="form-control" name="nama" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="telepon"> TELEPON</label>
            <input type="text" class="form-control" name="telepon" placeholder="Text input">
        </div>
        <div class="form-group">
            <label for="alamat">ALAMAT</label>
            <input type="text" class="form-control" name="alamat" placeholder="Text input">
        </div>
        <button type="submit" name="proses" value="simpan" class="btn btn-primary">KIRIM</button>
</form>
    <?php
    include "koneksi.php";
    if(isset($_POST['proses'])){
      $no_anggota = $_POST['no_anggota'];
      $nama = $_POST['nama'];
      $telepon = $_POST['telepon'];
      $alamat = $_POST['alamat'];

      mysqli_query($koneksi,"INSERT INTO anggota VALUES ('$no_anggota','$nama','$telepon','$alamat')");
     
    }
    ?>






    <?php
    include 'koneksi.php';

    $view = $koneksi->query("SELECT * FROM anggota ");
    ?>

    <h1>DATA ANGGOTA</h1>
   
   
    <table class="table table-striped">
      <tr>
        <th>NO ANGGOTA</th>
        <th>NAMA</th>
        <th>TELEPON</th>
        <th>ALAMAT</th>
        <th>UPDATE</th>
      </tr>
      <?php
      while ($row = $view->fetch_array()){
      ?>
      <tr>
        <td><?=$row['no_anggota']?></td>
        <td><?=$row['nama']?></td>
        <td><?=$row['telepon']?></td>
        <td><?=$row['alamat']?></td>
        <td>
          <a href="anggota_hapus.php?id=<?=$row['no_anggota']?>" onclick="return confirm ('yakin ingin menghapus')">HAPUS</a>
          <a href="anggota_edit.php?id=<?=$row['no_anggota']?>" onclick="return confirm ('yakin ingin edit')">EDIT</a>
        </td>
      </tr>
      <?php } ?>
    </table>

  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
