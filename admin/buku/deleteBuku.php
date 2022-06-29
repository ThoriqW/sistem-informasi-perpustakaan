<?php

include '../../conn.php';

$id_buku= $_GET['id_buku'];



$query="DELETE from anggota where id_anggota='$id'";
mysqli_query($mysqli, $query);
// mengalihkan ke halaman index.php
echo "<script>alert('Data yang anda Hapus Sukses');window.location='buku.php'</script>";
?>