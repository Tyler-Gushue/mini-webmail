<?php 

    session_start();

    require_once('../includes/dbFunctions.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $action = $_GET['action'];

        if ($action === 'received') {

            $results = getAllReceivedEmails($_SESSION['email']);
            $emails = [];

            // Learned from : https://www.w3schools.com/php/php_mysql_select.asp
            while ($row = $results->fetch_assoc()) {

                // learned from : https://www.w3schools.com/php/func_array_push.asp
                array_push($emails, $row);

            }

            echo json_encode($emails);
            exit();

        }
        else if ($action === 'sent') {

            $results = getAllSentEmails($_SESSION['email']);
            $emails = [];

            // Learned from : https://www.w3schools.com/php/php_mysql_select.asp
            while ($row = $results->fetch_assoc()) {

                // learned from : https://www.w3schools.com/php/func_array_push.asp
                array_push($emails, $row);

            }

            echo json_encode($emails);
            exit();

        }

    }

?>