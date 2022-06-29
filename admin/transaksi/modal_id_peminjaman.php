<?php

include '../../conn.php';
//Include database connection
if($_POST['idPeminjaman']) {
    $id = $_POST['idPeminjaman']; //escape string

    echo "<div class='id-peminjaman'>Kode Peminjaman : $id</div>";

    $sql = "SELECT peminjaman.id_peminjaman, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, peminjaman.status, anggota.nama, buku.judul_buku, users.fullname FROM peminjaman 
                        INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                        INNER JOIN buku ON peminjaman.id_buku = buku.id_buku 
                        INNER JOIN users ON peminjaman.id_admin = users.id_admin
                        WHERE id_peminjaman='$id'";

    $queryDetailPeminjaman = mysqli_query($mysqli, $sql);
    
        while ($row = mysqli_fetch_array($queryDetailPeminjaman)) {

            $nama = $row['nama'];
            $tgl_peminjam = $row['tanggal_peminjaman'];
            $tgl_pengembalian = $row['tanggal_pengembalian'];
            $nama_petugas = $row['fullname'];
            $status = $row['status'];

          echo "<div class='container'>
            <div class='row'>
                <div class='col-6 custom-box'>
                    <p class='title-peminjaman'>Nama Peminjam</p>
                    <p class='content-peminjaman'>$nama</p>
                </div>
                <div class='col-6 custom-box'>
                    <p class='title-peminjaman'>Tanggal Peminjam</p>
                    <p class='content-peminjaman'>$tgl_peminjam</p>
                </div>
                <div class='col-6 custom-box'>
                    <p class='title-peminjaman'>Nama Petugas</p>
                    <p class='content-peminjaman'>$nama_petugas</p>
                </div>
                <div class='col-6 custom-box'>
                    <p class='title-peminjaman'>Tanggal Pengembalian</p>
                    <p class='content-peminjaman'>$tgl_pengembalian</p>
                </div>
            </div>
        </div>";
        }
        
    echo "<div class='modal-footer'>
        <button type='button' class='btn' data-bs-dismiss='modal'>Close</button>
        <a type='button' class='btn' href='./pengembalian.php?id_peminjaman=$id'>Kembalikan</a>
    </div>";
 }
?>