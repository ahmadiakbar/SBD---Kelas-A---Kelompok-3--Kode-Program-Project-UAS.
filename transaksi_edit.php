<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM transaksi WHERE no_transaksi = '$id'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $no_transaksi = $row['no_transaksi'];
        $no_peminjaman = $row['no_peminjaman'];
        $tanggal_meminjam = $row['tanggal_meminjam'];
        $total = $row['total'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit TRANSAKSI</title>
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



        <h1>EDIT TRANSAKSI</h1>
        <form method="POST" action="transaksi_update.php">
            <div class="form-group">

            <label for="no_transaksi"> NO TRANSAKSI: </label>
           <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" value="<?php echo $no_transaksi; ?>">
            </div>
            
            <td>NO PEMINJAMAN: </td>
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
             
             <div class="form-group">
                 <label for="tanggal_meminjam">TANGGAL TRANSAKSI </label>
                 <input type="date" class="form-control" id="tanggal_meminjam" name="tanggal_meminjam" value="<?php echo $tanggal_meminjam; ?>">
             </div>

             <div class="form-group">
                 <label for="total"> TOTAL </label>
                 <input type="text" class="form-control" id="total" name="total" value="<?php echo $total; ?>">
             </div>
             
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>   
</body>
</html>
