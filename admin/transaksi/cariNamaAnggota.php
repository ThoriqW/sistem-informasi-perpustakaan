<?php

    include '../../conn.php';
          
        if(isset($_POST['id'])){

            $id = $_POST['id'];
          
            $queryNamaAnggota = mysqli_query($mysqli, "SELECT nama FROM anggota WHERE id_anggota='$id'");
            $result = array();
            while ($row = mysqli_fetch_array($queryNamaAnggota)) {
              $result = $row['nama']; //result dijadikan array 
              echo '<script> document.getElementById("namaAnggota").value = "' .$result . '"; </script>';
            }
        
    }
?>