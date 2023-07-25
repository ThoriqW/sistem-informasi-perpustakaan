<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.98.0">
  <title>Sistem Perpustakaan</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">

  <!-- Bosstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="./asset/css/style.css?v=<?php echo time(); ?>">
</head>

<body>

<div class="wrap-content">



<?php

  include './conn.php';
  include './core.php';

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
      <img class="foto-profile" src="img/profile-user.png" alt="foto-profile">
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
      <a href="./views/buku/viewBuku.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-book fa-lg icon-sidebar"></i></div>
        Buku
      </a>
    </li>
    <p class="dashboard-subtitle petugas-subtitle">TRANSAKSI</p>
    <li>
      <a href="./data_peminjaman.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fa fa-chevron-circle-up fa-lg icon-sidebar" aria-hidden="true"></i></div>
        Peminjaman
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
          <div class="card" style="width: 13rem;">
            <div class="card-body">
              <div class="card-content">
                <img class="img-card" src="img/open-book.png" alt="Book">
                <p class="card-number"><?php echo mysqli_num_rows($queryBuku) ?></p>
              </div>
              <p class="card-text">Total Buku</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="width: 13rem;">
            <div class="card-body">
              <div class="card-content">
                <img class="img-card" src="img/Peminjaman.png" alt="Book">
                <p class="card-number">30</p>
              </div>
              <p class="card-text">Peminjaman</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once "./partials/footer.php"; ?>
