<?php 

include "../../conn.php";

if(isset($_POST['submit'])){

    $id_peminjaman = $_POST['id_peminjaman'];
    $id_anggota = $_POST['inputIdAnggota'];
    $id_buku = $_POST['inputIdBuku'];
    $id_admin = $_POST['id_admin'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $status = 'Dipinjam';

}

$sql = "INSERT INTO peminjaman (id_peminjaman, id_anggota, id_buku, id_admin, tanggal_peminjaman, tanggal_pengembalian, status)
        VALUES ('$id_peminjaman','$id_anggota','$id_buku', '$id_admin', '$tgl_peminjaman', '$tgl_pengembalian', '$status')";


if(mysqli_query($mysqli, $sql)){
    $message='Here is an alert message written by php'; 
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    header("Location: data_peminjaman.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

$mysqli->close();

?>
