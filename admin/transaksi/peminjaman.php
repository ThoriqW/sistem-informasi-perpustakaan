<script type="text/javascript">

</script>

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

  date_default_timezone_set('Asia/Jakarta');

  include '../../conn.php';

  //mengambil Id terbesar dari id_peminjaman dan mengubah 3 huruf terakhir ke integer dan menambahkan 1 setiap kali melakukan peminjaman
  $queryId = mysqli_query($mysqli, "SELECT max(id_peminjaman) as idTerbesar FROM peminjaman");
  $dataId = mysqli_fetch_array($queryId);
  $idPeminjaman = $dataId['idTerbesar'];

  $urutanId = (int) substr($idPeminjaman, 4, 3);

  $hurufIdPeminjaman = 'PMJN';

  // query mendapatkan id anggota
  $queryAnggota = mysqli_query($mysqli, "SELECT * FROM anggota");
  $resultAnggota = array(); 
  while ($dataAnggota = mysqli_fetch_array($queryAnggota)) {
    $resultAnggota[] = $dataAnggota; //result dijadikan array 
  }

  // query mendapatkan id buku
  $queryBuku = mysqli_query($mysqli, "SELECT * FROM buku");
  $resultBuku = array(); 
  while ($dataBuku = mysqli_fetch_array($queryBuku)) {
    $resultBuku[] = $dataBuku; //result dijadikan array 
  }

  // query id Admin 
  $queryAdmin = mysqli_query($mysqli, "SELECT * FROM users WHERE username='Admin'");
  $resultIdAdmin = array();
  $resultNamaAdmin = array();
  while ($row = mysqli_fetch_array($queryAdmin)) {
    $resultIdAdmin = $row['id_admin'];
    $resultNamaAdmin = $row['fullname'];
  }


?>


<div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar">
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
      <a href="../transaksi/data_peminjaman.php" class="nav-link active">
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
      <h3 class="title-page">Peminjaman Buku</h3>
    </div>
    <hr class="line-page">

    <div class="tambah-anggota-container">
      <form action="proses_peminjaman.php" method="POST" class="row g-3">
        <div class="col-6">
            <?php 
              $urutanId++;
              $idPeminjaman = $hurufIdPeminjaman . sprintf("%03s", $urutanId);
            ?>
          <label for="id_peminjaman" class="form-label">Kode Peminjaman</label>
          <input type="email" class="form-control" id="id_peminjaman" name="id_peminjaman"  value="<?php echo $idPeminjaman; ?>" readonly>
        </div>
        <div class="col-6">
        <label for="inputIdAnggota" class="form-label">Id Anggota</label>
          <select id="inputIdAnggota" class="form-select" name="inputIdAnggota">
            <option value="">Pilih Id Anggota</option>
            <?php foreach ($resultAnggota as $agt): ?>
            <option>
            <?php echo $agt[0]?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-3">
          <?php 
            $today = date("Y-m-d H:i:s");
          ?>
          <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
          <input type="text" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value=" <?php echo $today ?>" readonly>
        </div>
        <div class="col-3">
          <?php
            $Datepengembalian = date('Y-m-d H:i:s', strtotime('+7 days'));
          ?>
          <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
          <input type="text" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value=" <?php echo $Datepengembalian ?>" readonly>
        </div>
        <div class="col-6">
          <label for="namaAnggota" class="form-label">Nama Anggota</label>
          <input type="text" class="form-control" id="namaAnggota" name="namaAnggota" readonly>
        </div>
        <div class="col-6">
          <label for="id_admin" class="form-label">Id Admin</label>
          <input type="text" class="form-control" id="id_admin" name="id_admin" value="<?php echo $resultIdAdmin ?>" readonly>
        </div>
        <div class="col-6">
          <label for="namaAdmin" class="form-label">Nama Admin</label>
          <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" value="<?php echo $resultNamaAdmin ?>" readonly>
        </div>
        <div class="col-4">
          <label for="inputState" class="form-label">Id Buku</label>
          <select id="inputIdBuku" name="inputIdBuku" class="form-select">
            <option value="">Pilih Id Buku</option>
            <?php foreach ($resultBuku as $kdBuku): ?>
            <option>
            <?php echo $kdBuku['id_buku']?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-4">
          <label for="inputCity" class="form-label">Nama Buku</label>
          <input type="text" class="form-control" id="namaBuku" name="namaBuku" readonly>
        </div>
        <div class="col-md-4">
          <label for="inputZip" class="form-label">Pengarang</label>
          <input type="text" class="form-control" id="namaPengarang" name="namaPengarang" readonly>
        </div>
        <div class="col-12">
          <button type="submit" name="submit" value="Submit" class="btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>





<!-- Footer HTML -->
<?php include_once "../footer.php"; ?>