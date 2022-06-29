<!-- Connected to database -->
<?php include_once "../../conn.php" ?>

<!-- Header HTML -->
<?php include_once "../header.php"; ?>

<?php 

  session_start();
  
  if (!isset($_SESSION['fullname'])) {
      header("Location: login.php");
  }

?>

<?php

$id = $_GET['id_anggota'];

$anggota = mysqli_query($mysqli, "SELECT * FROM anggota where id_anggota='$id'");
$row = mysqli_fetch_array($anggota);

?>

<!-- Update Anggota -->
<?php

if (isset($_POST['submit'])){

  $id_anggota = $_POST['id_anggota'];
  $nama_anggota = $_POST['nama_anggota'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat_anggota = $_POST['alamat_anggota'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $nomor_telepon = $_POST['nomor_telepon'];
  $foto_anggota = $_POST['foto_anggota'];

  // query SQL untuk insert data ke dalam Mysql
  $query="UPDATE anggota SET id_anggota='$id_anggota', nama='$nama_anggota', tempat_lahir='$tempat_lahir', 
          tempat_lahir='$tempat_lahir', tgl_lahir='$tanggal_lahir', alamat='$alamat_anggota', jenis_kelamin='$jenis_kelamin',
          nmr_telp='$nomor_telepon', foto='$foto_anggota' WHERE id_anggota='$id'";

  mysqli_query($mysqli, $query);
  // mengalihkan ke halaman index.php
  echo "<script>alert('Data yang anda Update sukses');window.location='anggota.php'</script>";
    
}

?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="title-app">PERPUSTAKAAN PALU</span>
  </a>
  <hr>
  <div class="dashboard-profile">
    <div class="img-box-profile">
      <img class="foto-profile" src="../../img/profile-user.png" alt="foto-profile">
    </div>
    <div>
      <span class="welcome-profile">Welcome</span>
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="title-app"><?php echo $_SESSION["fullname"]; ?></span>
      </a>
    </div>
  </div>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <P class="dashboard-subtitle">DATA MASTER</P>
    <li class="nav-item">
      <a href="../dashboard/index.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-house fa-lg icon-sidebar"></i></div>
        Dashboard
      </a>
    </li>
    <li>
      <a href="../anggota/anggota.php" class="nav-link active" aria-current="page">
        <div class="icons-sidebar"><i class="fas fa-user-group fa-lg icon-sidebar"></i></div>
        Anggota
      </a>
    </li>
    <li>
      <a href="../buku/buku.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-book fa-lg icon-sidebar"></i></div>
        Buku
      </a>
    </li>
    <p class="dashboard-subtitle petugas-subtitle">TRANSAKSI</p>
    <li>
      <a href="../transaksi/data_peminjaman.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fa fa-chevron-circle-up fa-lg icon-sidebar" aria-hidden="true"></i></div>
        Peminjaman
      </a>
    </li>
    <li>
      <a href="../transaksi/data_pengembalian.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fa fa-chevron-circle-down fa-lg icon-sidebar" aria-hidden="true"></i></div>
        Pengembalian
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fa fa-file fa-lg icon-sidebar"></i></div>
        Laporan
      </a>
      </a>
    </li>
  </ul>
  <hr>
</div>

<div class="right-container">

  <!-- Navbar -->
  <nav class="navbar navbar-custom bg-light">
    <div class="container-fluid">
      <a class="navbar-brand tanggal-navbar"></a>
      <form class="d-flex" role="search">
        <a href="logout.php" class="btn" type="submit">Keluar</a>
      </form>
    </div>
  </nav>

  <div class="container-fluid">

    <!-- Content Anggota -->

    <div class="d-flex justify-content-between">
      <h3 class="title-page">Edit Anggota <?php echo $row["nama"]; ?></h3>
    </div>
    <hr class="line-page">

      <div class="tambah-anggota-container">
          <form action="" method="post">
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Id Anggota</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_anggota" id="id_anggota" value="<?php echo $row['id_anggota'] ?>">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" value="<?php echo $row['nama'] ?>">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tempat Lahir</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $row['tempat_lahir'] ?>">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $row['tgl_lahir'] ?>">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat_anggota" id="alamat_anggota" value="<?php echo $row['alamat'] ?>">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $row['jenis_kelamin'] ?>">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Telepon</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" value="<?php echo $row['nmr_telp'] ?>">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Foto</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="foto_anggota" id="foto_anggota" value="<?php echo $row['foto'] ?>">
              </div>
              </div>
              <div class="btn-form-anggota">
                  <button type="submit"  name="submit" value="Submit" class="btn btn-form">Update</button>
              </div>
          </form>
      </div>

  </div>
</div>





<!-- Footer HTML -->
<?php include_once "../footer.php"; ?>