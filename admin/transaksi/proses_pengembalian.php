<?php 

include "../../conn.php";

if(isset($_POST['submit'])){

    $id_peminjaman = $_POST['id_peminjaman'];
    $denda = $_POST['denda'];
    $telat = $_POST['terlambat'];
    $status = 'Dikembalikan';

}

$sql = "UPDATE peminjaman SET status='$status', terlambat='$telat', denda='$denda' WHERE id_peminjaman = '$id_peminjaman'";


if(mysqli_query($mysqli, $sql)){
    $message='Here is an alert message written by php'; 
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    header("Location: data_peminjaman.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

$mysqli->close();

?>