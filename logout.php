<?php

    include_once "./core.php";

    session_start();
    unset($_SESSION['username']);
    session_unset();
    session_destroy();
    header("Location: {$home_url}login.php");
?>