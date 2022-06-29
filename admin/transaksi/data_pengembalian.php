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
      <a href="../anggota/anggota.php" class="nav-link text-white" aria-current="page">
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
      <a href="../transaksi/data_peminjaman.php" class="nav-link text-white ">
        <div class="icons-sidebar"><i class="fa fa-chevron-circle-up fa-lg icon-sidebar" aria-hidden="true"></i></div>
        Peminjaman
      </a>
    </li>
    <li>
      <a href="../transaksi/data_pengembalian.php" class="nav-link active">
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
      <a href="peminjaman.php" class="btn">
          Pinjam Buku
      </a>
    </div>

    <div class="table">

      <table class="table table-bordered">
      <thead>
          <tr>
              <th>ID</th>
              <th>Nama Anggota</th>
              <th>Nama Buku</th>
              <th>Nama Admin</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>

        <?php
            $sql = "SELECT peminjaman.id_peminjaman, peminjaman.status, anggota.nama, buku.judul_buku, users.fullname FROM peminjaman 
                        INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                        INNER JOIN buku ON peminjaman.id_buku = buku.id_buku 
                        INNER JOIN users ON peminjaman.id_admin = users.id_admin
                        WHERE status='Dikembalikan'";
            $query = mysqli_query($mysqli, $sql);

            while($anggota = mysqli_fetch_array($query)){
        ?>
             <tr>

                <td> <?php echo $anggota['id_peminjaman']; ?> </td>
                <td> <?php echo $anggota['nama']; ?> </td>
                <td> <?php echo $anggota['judul_buku'];; ?> </td>
                <td> <?php echo $anggota['fullname']; ?></td>
                <td> <?php echo $anggota['status']; ?> </td>

                <td>
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class='btn btn-table view' data-id="<?php echo $anggota['id_peminjaman']; ?>">View</a>
                <a class='btn btn-table'>Hapus</a>
                </td>

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

<?php include_once "../footer.php"; ?>