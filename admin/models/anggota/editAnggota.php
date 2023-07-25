<!-- Update Anggota -->
<?php

include '../../../conn.php';

if (isset($_POST['submit'])){

  //Upload foto
  $filename = $_FILES["foto_anggota"]["name"];
  $tempname = $_FILES["foto_anggota"]["tmp_name"];
  $folder = "../../../asset/foto/anggota/" . $filename;

  $id_anggota = $_POST['id_anggota'];
  $nama_anggota = $_POST['nama_anggota'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat_anggota = $_POST['alamat_anggota'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $nomor_telepon = $_POST['nomor_telepon'];

  // query SQL untuk insert data ke dalam Mysql
  $sql="UPDATE anggota SET nama='$nama_anggota', tempat_lahir='$tempat_lahir', 
          tempat_lahir='$tempat_lahir', tgl_lahir='$tanggal_lahir', alamat='$alamat_anggota', jenis_kelamin='$jenis_kelamin',
          nmr_telp='$nomor_telepon', foto='$filename' WHERE id_anggota='$id_anggota'";

  $query_select_foto = "SELECT foto FROM anggota WHERE id_anggota='$id_anggota'";
  $result = mysqli_query($mysqli, $query_select_foto);
  $row = mysqli_fetch_assoc($result);
  $previous_photo = $row['foto'];

  if (!empty($previous_photo)) {
    $previous_photo_path = "../../../asset/foto/anggota/" . $previous_photo;
    if (file_exists($previous_photo_path)) {
        unlink($previous_photo_path);
    }
  }

  if(mysqli_query($mysqli, $sql)){
    move_uploaded_file($tempname, $folder);
    $message='Data yang anda Update sukses'; 
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    header("Location: ../../views/anggota/viewAnggota.php");
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
  }

  $mysqli->close();
  
}

?>