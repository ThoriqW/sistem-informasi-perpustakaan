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
        
        $sql = "INSERT INTO anggota (id_anggota, nama, tempat_lahir, tgl_lahir, alamat, jenis_kelamin, nmr_telp, foto)
                VALUES ('$id_anggota','$nama_anggota','$tempat_lahir', '$tanggal_lahir', '$alamat_anggota', '$jenis_kelamin', '$nomor_telepon', '$filename')";

        if(mysqli_query($mysqli, $sql)){
        move_uploaded_file($tempname, $folder);
            $message='Here is an alert message written by php'; 
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
            header("Location: ../../views/anggota/viewAnggota.php");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }

        $mysqli->close();

    };



?>