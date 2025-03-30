<?php 

    require_once('../db/db.php');

    function getPassword($email) {

        global $mysql;

        try {

            $stmt = $mysql->prepare("SELECT * FROM login WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            return $row['password'];

        }
        catch (Exception $e) {

            error_log("error with retrieving password: " . $e->getMessage());
            return 0;

        }

    }

    function getAllSentEmails ($email) {

        global $mysql;

        try {

            $stmt = $mysql->prepare("SELECT * FROM emails WHERE senderEmail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result;

        }
        catch (Exception $e) {

            error_log("error with retreiving sent emails: " . $e->getMessage());
            return 0;

        }

    }

    function getAllReceivedEmails ($email) {

        global $mysql;

        try {

            $stmt = $mysql->prepare("SELECT * FROM emails WHERE recipientEmail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result;

        }
        catch (Exception $e) {

            error_log("error with retreiving received emails: " . $e->getMessage());
            return 0;

        }

    }

?>