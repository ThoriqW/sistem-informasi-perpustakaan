<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "sistem_perpustakaan";

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);

    if($mysqli->connect_error) {
      die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
    echo "Connected successfully";

  ?>