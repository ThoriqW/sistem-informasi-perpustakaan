<?php include_once "../header.php"; ?>



<?php

  include '../../conn.php';
  include '../../core.php';

  //query total anggota
  $sqlAnggota = "SELECT * FROM anggota ORDER BY id_anggota ASC";
  $queryAnggota = mysqli_query($mysqli, $sqlAnggota);

  //query total buku
  $sqlBuku = "SELECT * FROM buku ORDER BY id_buku ASC";
  $queryBuku = mysqli_query($mysqli, $sqlBuku);
  
  if (!isset($_SESSION['username'])) {
      header("Location: {$home_url}login.php");
  }

?>

<div class="d-flex flex-column flex-shrink-0 text-white sidebar">
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
      <a href="#" class="nav-link active" aria-current="page">
        <div class="icons-sidebar"><i class="fas fa-house fa-lg icon-sidebar"></i></div>
        Dashboard
      </a>
    </li>
    <li>
      <a href="../anggota/anggota.php" class="nav-link text-white">
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
      <button class="btn open-navbar change" onclick="navButton(this)">Menu</button>
      <a class="navbar-brand tanggal-navbar"></a>
      <form class="d-flex" role="search">
        <a href="../logout.php" class="btn" type="submit">Keluar</a>
      </form>
    </div>
  </nav>

  <div class="container-fluid">
    <!-- Content Dashboard -->

    <h3 class="title-page">Dashboard</h3>
    <hr class="line-page">

    <div class="sub-title-page">
      <h6>Selamat datang di</h6>
      <h4>SISTEM INFORMASI PERPUSTAKAAN</h4>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <div class="card-content">
                <img class="img-card" src="../../img/open-book.png" alt="Book">
                <p class="card-number"><?php echo mysqli_num_rows($queryBuku) ?></p>
              </div>
              <p class="card-text">Total Buku</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <div class="card-content">
                <img class="img-card" src="../../img/anggota.png" alt="Book">
                <p class="card-number"><?php echo mysqli_num_rows($queryAnggota) ?></p>
              </div>
              <p class="card-text">Total Anggota</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <div class="card-content">
                <img class="img-card" src="../../img/Peminjaman.png" alt="Book">
                <p class="card-number">30</p>
              </div>
              <p class="card-text">Peminjaman</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <div class="card-content">
                <img class="img-card" src="../../img/admin.png" alt="Book">
                <p class="card-number">1</p>
              </div>
              <p class="card-text">Admin</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once "../footer.php"; ?>
