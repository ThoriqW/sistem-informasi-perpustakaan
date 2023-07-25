<?php

include '../../../conn.php';

$id_buku= $_GET['id_buku'];



$query="DELETE from buku where id_buku='$id_buku'";
mysqli_query($mysqli, $query);
// mengalihkan ke halaman index.php
echo "<script>alert('Data yang anda Hapus Sukses');window.location='../../views/buku/viewBuku.php'</script>";
?>