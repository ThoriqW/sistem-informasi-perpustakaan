<?php

    include '../../../conn.php';
          
        if(isset($_POST['id'])){

            $id = $_POST['id'];
          
            $queryBuku = mysqli_query($mysqli, "SELECT * FROM buku WHERE id_buku='$id'");
            $result1 = array();
            $result2 = array();
            while ($row = mysqli_fetch_array($queryBuku)) {
              $result1 = $row['judul_buku'];
              $result2 = $row['pengarang']; //result dijadikan array 
              echo '<script> document.getElementById("namaBuku").value = "' .$result1 . '"; </script>';
              echo '<script> document.getElementById("namaPengarang").value = "' .$result2 . '"; </script>';
            }
        
    }
?>