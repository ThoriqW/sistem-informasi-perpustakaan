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


    $id = $_GET['id_peminjaman'];

    $sql = "SELECT peminjaman.id_peminjaman, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, anggota.nama, buku.judul_buku, users.fullname FROM peminjaman 
                        INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                        INNER JOIN buku ON peminjaman.id_buku = buku.id_buku 
                        INNER JOIN users ON peminjaman.id_admin = users.id_admin
                        WHERE id_peminjaman='$id'";

    $peminjaman = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($peminjaman);

    //Hitung Denda dan Telat Hari
    $tanggalPinjam = $row['tanggal_peminjaman'];
    $tanggalKembali = date("Y-m-d H:i:s");

    $total_hari_pinjam = abs(strtotime($tanggalPinjam) - strtotime($tanggalKembali));
    $hitung_hari = floor($total_hari_pinjam/(60*60*24));

    if($hitung_hari > 7){
        $telat = $hitung_hari - 7;
        $denda = 1000 * $telat;
    }else{
        $telat = 0;
        $denda = 0;
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
      <h3 class="title-page">Pengembalian Buku</h3>
    </div>
    <hr class="line-page">

    <div class="tambah-anggota-container">
      <form action="proses_pengembalian.php" method="POST" class="row g-3">
        <div class="col-6">
          <label for="id_peminjaman" class="form-label">Kode Peminjaman</label>
          <input type="email" class="form-control" id="id_peminjaman" name="id_peminjaman"  value="<?php echo $row['id_peminjaman']; ?>" readonly>
        </div>
        <div class="col-6">
            <label for="inputIdAnggota" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="namaAnggota" name="namaAnggota" value=" <?php echo $row['nama'] ?>" readonly>
        </div>
        <div class="col-3">
          <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
          <input type="text" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value=" <?php echo $row['tanggal_peminjaman'] ?>" readonly>
        </div>
        <div class="col-3">
          <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
          <input type="text" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value=" <?php echo $row['tanggal_pengembalian'] ?>" readonly>
        </div>
        <div class="col-6">
          <label for="inputCity" class="form-label">Nama Buku</label>
          <input type="text" class="form-control" id="namaBuku" name="namaBuku" value=" <?php echo $row['judul_buku'] ?>" readonly>
        </div>
        <hr>
        <div class="col-6">
          <label for="id_admin" class="form-label">Terlambat</label>
          <input type="text" class="form-control" id="terlambat" name="terlamabat" value="<?php echo $telat ?>" readonly>
        </div>
        <div class="col-6">
          <label for="namaAdmin" class="form-label">Denda</label>
          <input type="text" class="form-control" id="denda" name="denda" value="<?php echo $denda ?>" readonly>
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