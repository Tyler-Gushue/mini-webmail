<?php 

    session_start();

    require_once('../includes/dbFunctions.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $json = file_get_contents('php://input');

        $data = json_decode($json, true);

        $email = $data['email'];
        $password = $data['password'];
    
        $hashedPassword = getPassword($email);
    
        if (password_verify($password, $hashedPassword)) {
    
            $_SESSION['email'] = $email;
    
            echo json_encode(['success' => true]);
            exit();
    
        }
        else {
    
            echo json_encode(['success' => false]);
            exit();
    
        }

    }

?>