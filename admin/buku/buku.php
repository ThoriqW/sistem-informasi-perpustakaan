<?php include_once "../../conn.php" ?>

<?php include_once "../header.php" ?>

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
      <a href="../dashboard/index.php" class="nav-link text-white" aria-current="page">
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
      <a href="../buku/buku.php" class="nav-link active">
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

    <h3 class="title-page">Anggota</h3>
    <hr class="line-page">

    <div class="tambah-anggota-btn">
      <a href="tambahBuku.php" class="btn">
          Tambah Buku
      </a>
    </div>

    <div class="table">

      <table class="table table-bordered">
      <thead>
          <tr>
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

          while($buku = mysqli_fetch_array($query)){
              echo "<tr>";

              echo "<td>".$buku['id_buku']."</td>";
              echo "<td>".$buku['judul_buku']."</td>";
              echo "<td>".$buku['pengarang']."</td>";
              echo "<td>".$buku['penerbit']."</td>";
              echo "<td>".$buku['tahun']."</td>";

              echo "<td>";
              echo "<a class='btn btn-table edit' href='form-edit.php?id_buku=".$buku['id_buku']."'>Edit</a>";
              echo "<a class='btn btn-table view' href='hapus.php?id_buku=".$buku['id_buku']."'>View</a>";
              echo "<a class='btn btn-table' href='deleteData.php?id_buku=".$buku['id_buku']."'>Hapus</a>";
              echo "</td>";

              echo "</tr>";
          }
          ?>

      </tbody>
      </table>

      <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </div>

  </div>
</div>


<?php include_once "../footer.php" ?>