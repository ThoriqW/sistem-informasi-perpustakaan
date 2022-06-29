<?php

include '../../conn.php';

$id_anggota= $_GET['id_anggota'];



$query="DELETE from anggota where id_anggota='$id_anggota'";
mysqli_query($mysqli, $query);
// mengalihkan ke halaman index.php
echo "<script>alert('Data yang anda Hapus Sukses');window.location='anggota.php'</script>";
?>