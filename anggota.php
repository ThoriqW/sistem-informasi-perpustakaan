<!-- Connected to database -->
<?php include_once "./conn.php" ?>

<!-- Header HTML -->
<?php include_once "./partials/header.php"; ?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="title-app">PERPUSTAKAAN PALU</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <P class="dashboard-subtitle">DATA MASTER</P>
    <li class="nav-item">
      <a href="index.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-house fa-lg icon-sidebar"></i></div>
        Dashboard
      </a>
    </li>
    <li>
      <a href="anggota.php" class="nav-link active" aria-current="page">
        <div class="icons-sidebar"><i class="fas fa-user-group fa-lg icon-sidebar"></i></div>
        Anggota
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-book fa-lg icon-sidebar"></i></div>
        Buku
      </a>
    </li>
    <p class="dashboard-subtitle petugas-subtitle">PETUGAS</p>
    <li>
      <a href="#" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-upload fa-lg icon-sidebar"></i></div>
        Peminjaman
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-download fa-lg icon-sidebar"></i></div>
        Pengembalian
      </a>
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
      data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>Petugas</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</div>

<div class="right-container">
  <!-- Navbar -->
  <nav class="navbar navbar-custom bg-light">
    <div class="container-fluid">
      <p class="navbar-brand tanggal-navbar" href="#"></p>
      <form class="d-flex">
        <button class="btn" type="submit">Keluar</button>
      </form>
    </div>
  </nav>

  <!-- Content Anggota -->

  <h3 class="title-page">Anggota</h3>
  <hr class="line-page">

  <div class="table-anggota">

    <script>

      <?php

        $sql = "SELECT * FROM anggota";

        $mydata = []; /* will be used to store result array */

        if ($result = $mysqli->query($sql)) {
          $mydata = $result->fetch_all(MYSQLI_ASSOC);
          $result->close();
        }

      ?>

      var dataValues = <?php echo json_encode($mydata) ?>;

      <?php
        $mysqli->close();
      ?>

      window.onload = function() {
        document.querySelector('zing-grid').data = dataValues;
      }
    </script>
    <zing-grid caption="Daftar Anggota">
      
    </zing-grid>

  </div>

</div>

<?php include_once "./partials/footer.php"; ?>