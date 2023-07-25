<?php 

include '../../../conn.php';

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
        header("Location: ../../views/buku/viewBuku.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }

    $mysqli->close();

};



?>