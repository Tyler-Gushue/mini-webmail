<?php 

    session_start();

    require_once('../includes/dbFunctions.php');

    error_log(">>> emails.php accessed with method: " . $_SERVER['REQUEST_METHOD']);

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

    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $json = file_get_contents('php://input');

        $data = json_decode($json, true);

        $action = $data['action'];

        if (!$data) {
            echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
            exit();
        }

        if ($action === 'sendEmail') {

            $senderEmail = $_SESSION['email'];
            $recipientEmail = $data['recipient'];
            $emailSubject = $data['subject'];
            $emailContent = $data['content'];

            if (sendEmail($senderEmail, $recipientEmail, $emailSubject, $emailContent)) {

                echo json_encode(['success' => true]);
                exit();

            }
            else {

                echo json_encode(['success' => false]);
                exit();

            }

        }

    }

?>