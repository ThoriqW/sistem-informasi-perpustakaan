<!-- Connected to database -->
<?php include_once "../../conn.php" ?>

<!-- Header HTML -->
<?php include_once "../../partials/header.php"; ?>

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
      <a href="../../index.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-house fa-lg icon-sidebar"></i></div>
        Dashboard
      </a>
    </li>
    <li>
      <a href="../buku/viewBuku.php" class="nav-link text-white">
        <div class="icons-sidebar"><i class="fas fa-book fa-lg icon-sidebar"></i></div>
        Buku
      </a>
    </li>
    <p class="dashboard-subtitle petugas-subtitle">TRANSAKSI</p>
    <li>
      <a href="../peminjaman/viewPeminjaman.php" class="nav-link active">
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

    <h3 class="title-page">Peminjaman</h3>
    <hr class="line-page">

    <div class="table">

      <table class="table table-bordered">
      <thead>
          <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama Anggota</th>
              <th>Nama Buku</th>
              <th>Nama Admin</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>

        <?php
            $sql = "SELECT peminjaman.id_peminjaman, peminjaman.status, anggota.nama, buku.judul_buku, users.fullname FROM peminjaman 
                        INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                        INNER JOIN buku ON peminjaman.id_buku = buku.id_buku 
                        INNER JOIN users ON peminjaman.id_admin = users.id_admin
                        WHERE status='Dipinjam'";
            $query = mysqli_query($mysqli, $sql);

            $number = 0;

            while($anggota = mysqli_fetch_array($query)){
              $number += 1;
        ?>
             <tr>

                <td> <?php echo $number; ?> </td>
                <td> <?php echo $anggota['id_peminjaman']; ?> </td>
                <td> <?php echo $anggota['nama']; ?> </td>
                <td> <?php echo $anggota['judul_buku'];; ?> </td>
                <td> <?php echo $anggota['fullname']; ?></td>
                <td> <?php echo $anggota['status']; ?> </td>

              </tr>
            
        <?php
            }
        ?>
      </tbody>
      </table>

      <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </div>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="id-peminjaman-modal"></div>
    </div>
  </div>
</div>

<?php include_once "../../partials/footer.php"; ?>