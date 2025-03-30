<?php 

    session_start();

    require_once('../includes/dbFunctions.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = getPassword($email);

    if (password_verify($password, $hashedPassword)) {

        $_SESSION['email'] = $email;

        header("Location: ../public/inbox.php");

    }
    else {

        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../public/login.php");

    }

?>