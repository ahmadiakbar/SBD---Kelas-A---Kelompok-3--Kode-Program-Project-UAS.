<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM nota WHERE no_nota = '$id'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $no_nota = $row['no_nota'];
        $tanggal_peminjaman = $row['tanggal_peminjaman'];
        $tanggal_kembali = $row['tanggal_kembali'];
        $jaminan = $row['jaminan'];
        $id_kasir = $row['id_kasir'];
        $no_anggota = $row['no_anggota'];
        $no_transaksi = $row['no_transaksi'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit nota</title>
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
                    <a class="nav-link" href="anggota_input.php">ANGGOTA</a>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="biaya_sewa_input.php"> BIAYA SEWA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buku_jenis_input.php"> JENIS BUKU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kasir_input.php"> KASIR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buku_input.php"> BUKU </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pinjaman_input.php"> PEMINJAMAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi_input.php"> TRANSAKSI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nota_input.php"> NOTA</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



        <h1>EDIT BUKU</h1>
        <form method="POST" action="nota_update.php">
            <div class="form-group">
                <label for="no_nota"> NO  NOTA:</label>
                <input type="text" class="form-control" id="no_nota" name="no_nota" value="<?php echo $no_nota; ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_peminjaman">TANGGAL TRANSAKSI:</label>
                <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?php echo $tanggal_peminjaman; ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">TANGGAL KEMBALI:</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?php echo $tanggal_kembali; ?>">
            </div>
            <div class="form-group">
                <label for="jaminan">JAMINAN:</label>
                <input type="text" class="form-control" id="jaminan" name="jaminan" value="<?php echo $jaminan; ?>">
            </div>
            
            <td>ID KASIR</td>
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


            <td>NO ANGGOTA</td>
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
             
            <td>NO TRANSAKSI</td>
                  <select class="form-control" id="no_transaksi" name="total">

                    <?php
                 $koneksi = mysqli_connect("localhost", "root", "", "buku_sewa");
                 $query = "SELECT * FROM transaksi";
                 $result = mysqli_query($koneksi, $query);
      
                 while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['no_transaksi'] . "'>" . $row['total'] . "</option>";
                }
                 ?>

             </select>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>   
</body>
</html>
