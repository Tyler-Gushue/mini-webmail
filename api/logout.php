<?php 

    session_start();

    if (!isset($_SESSION['email'])) {

        header("Location: ../public/login.php");
        exit();

    }

    setcookie("lastLogin", date("Y/m/d"), time() + (86400 * 30), "/");

    $_SESSION = array();

    session_destroy();

    header("Location: ../public/login.php");

?>