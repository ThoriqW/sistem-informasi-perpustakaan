<!-- Connected to database -->
<?php include_once "../../../conn.php" ?>

<!-- Header HTML -->
<?php include_once "../../header.php"; ?>

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

<div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="title-app">PERPUSTAKAAN PALU</span>
  </a>
  <hr>
  <div class="dashboard-profile">
    <div class="img-box-profile">
      <img class="foto-profile" src="../../../img/profile-user.png" alt="foto-profile">
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
      <h3 class="title-page">Profile Anggota</h3>
    </div>
    <hr class="line-page">
    
    <div class="container-profile">

      <div class="row">
        <div class="col-lg-3">
          <img class="foto-anggota rounded" src="../../../asset/foto/anggota/<?php echo $row['foto'] ?>" alt="foto-anggota">
        </div>
        <div class="col-lg-9">
          <div class="nama-profile-anggota"><?php echo $row['nama'] ?></div>
          <div class="p-profile"><?php echo $row['id_anggota'] ?></div>
          <div class="p-profile"><?php echo $row['jenis_kelamin'] ?></div>
          <a class='btn btn-profile' href='viewEditAnggota.php?id_anggota=<?php echo $id; ?>'>Edit</a>
        </div>
      </div>
      <hr class="line-page">
      <div class="row">
        <div class="col-lg-3">
          <div class="box-profile">
            <p class="title-profile">Tempat Lahir</p>
            <div><?php echo $row['tempat_lahir'] ?></div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="box-profile">
            <p class="title-profile">Tanggal Lahir</p>
            <div><?php echo $row['tgl_lahir'] ?></div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box-profile">
            <p class="title-profile">Alamat</p>
            <div><?php echo $row['alamat'] ?></div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="box-profile">
            <p class="title-profile">Nomor Telepon</p>
            <div><?php echo $row['nmr_telp'] ?></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>





<!-- Footer HTML -->
<?php include_once "../../footer.php"; ?>