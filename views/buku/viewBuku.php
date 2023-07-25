<?php include_once "../../conn.php" ?>

<?php include_once "../../partials/header.php" ?>

<?php 

  session_start();
  
  if (!isset($_SESSION['fullname'])) {
      header("Location: login.php");
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
      <a href="../../index.php" class="nav-link text-white" aria-current="page">
        <div class="icons-sidebar"><i class="fas fa-house fa-lg icon-sidebar"></i></div>
        Dashboard
      </a>
    </li>
    <li>
      <a href="../buku/viewBuku.php" class="nav-link active">
        <div class="icons-sidebar"><i class="fas fa-book fa-lg icon-sidebar"></i></div>
        Buku
      </a>
    </li>
    <p class="dashboard-subtitle petugas-subtitle">TRANSAKSI</p>
    <li>
      <a href="../peminjaman/viewPeminjaman.php" class="nav-link text-white">
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

    <!-- Content Anggota -->

    <h3 class="title-page">Buku</h3>
    <hr class="line-page">

    <div class="table">

      <table class="table table-bordered">
      <thead>
          <tr>
              <th>No</th>
              <th>ID</th>
              <th>Judul Buku</th>
              <th>Pengarang</th>
              <th>Penerbit</th>
              <th>Tahun</th>
          </tr>
      </thead>
      <tbody>

          <?php
          $sql = "SELECT * FROM buku";
          $query = mysqli_query($mysqli, $sql);

          $number = 0;

          while($buku = mysqli_fetch_array($query)){

              $number += 1;

              echo "<tr>";

              echo "<td>".$number."</td>";
              echo "<td>".$buku['id_buku']."</td>";
              echo "<td>".$buku['judul_buku']."</td>";
              echo "<td>".$buku['pengarang']."</td>";
              echo "<td>".$buku['penerbit']."</td>";
              echo "<td>".$buku['tahun']."</td>";

              echo "</tr>";
          }
          ?>

      </tbody>
      </table>

      <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </div>

  </div>
</div>


<?php include_once "../../partials/footer.php" ?>