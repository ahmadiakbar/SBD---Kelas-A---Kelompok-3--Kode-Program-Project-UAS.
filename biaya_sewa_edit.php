<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM biaya__sewa WHERE kode_biaya = '$id'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $kode_biaya = $row['kode_biaya'];
        $biaya_sewa = $row['biaya_sewa'];
       
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Biaya Sewa</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="tampil.php"> TAMPILKAN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



        <h1>Edit Biaya Sewa</h1>
        <form method="POST" action="biaya_sewa_update.php">
            <div class="form-group">
                <label for="kode_biaya">KODE BIAYA:</label>
                <input type="text" class="form-control" id="kode_biaya" name="kode_biaya" value="<?php echo $kode_biaya; ?>">
            </div>
            <div class="form-group">
                <label for="biaya_sewa">BIAYA SEWA:</label>
                <input type="text" class="form-control" id="biaya_sewa" name="biaya_sewa" value="<?php echo $biaya_sewa; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
