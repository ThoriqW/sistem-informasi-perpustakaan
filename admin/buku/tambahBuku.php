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

//mengambil Id terbesar dari id_buku dan mengubah 3 huruf terakhir ke integer dan menambahkan 1 setiap kali tambah buku
$queryId = mysqli_query($mysqli, "SELECT max(id_buku) as idTerbesar FROM buku");
$dataId = mysqli_fetch_array($queryId);
$idBuku = $dataId['idTerbesar'];

$urutanId = (int) substr($idBuku, 3, 3);

$hurufIdBuku = 'MBR';

if (isset($_POST['submit'])){

    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    
    $sql = "INSERT INTO buku (id_buku, judul_buku, pengarang, penerbit, tahun)
            VALUES ('$id_buku','$judul_buku','$pengarang', '$penerbit', '$tahun')";

    if(mysqli_query($mysqli, $sql)){
        $message='Berhasil Tambah Buku'; 
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        header("Location: buku.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }

    $mysqli->close();

};

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

    <div class="d-flex justify-content-between">
      <h3 class="title-page">Tambah Buku</h3>
    </div>
    <hr class="line-page">

      <div class="tambah-anggota-container">
          <form action="" method="post">
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Id Buku</label>
                <?php 
                  $urutanId++;
                  $idBuku = $hurufIdBuku . sprintf("%03s", $urutanId);
                ?>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_buku" id="id_anggota" value="<?php echo $idBuku; ?>" readonly>
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Judul Buku</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="judul_buku" id="nama_anggota">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Pengarang</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="pengarang" id="tempat_lahir">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Penerbit</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="penerbit" id="tanggal_lahir">
              </div>
              </div>
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="tahun" id="alamat_anggota">
              </div>
              </div>
              <div class="btn-form-anggota">
                  <button type="submit"  name="submit" value="Submit" class="btn btn-form">Tambah</button>
                  <a href="anggota.php" type="submit" class="btn btn-form">Batal</a>
              </div>
          </form>
      </div>

  </div>
</div>





<!-- Footer HTML -->
<?php include_once "../footer.php"; ?>