<?php 

    session_start();

    if (!isset($_SESSION['email'])) {

        header("Location: login.php");
        exit();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="GET" action="../api/logout.php">
        <input type="submit" value="Logout">
    </form>

    <form method="GET" action="sentEmails.php">
        <input type="submit" value="Sent Emails">
    </form>

    <?php 
    
        if (isset($_COOKIE['lastLogin'])) {

            echo "<h4>Welcome Back!  Last Login : " . $_COOKIE['lastLogin'] . "</h4>";

        }
        else {

            echo "<h4>Welcome to your inbox!</h4>";

        }
    
    ?>

    <div id="inbox">

    </div>

    <script>

        function fetchEmails() {

            fetch('../api/emails.php?action=received', {
                method: 'GET'
            })
            .then (res => res.json())
            .then(data => {

                let emailTable = "<table>" 
                emailTable += "<tr>"
                emailTable += "<th>Sender</th>"
                emailTable += "<th>Recipient</th>"
                emailTable += "<th>Subject</th>"
                emailTable += "<th>Message</th>"
                emailTable += "<th>Date</th>";
                emailTable += "</tr>"    

                data.forEach(email=>{

                    emailTable += "<tr>";
                    emailTable += "<td>" + email.senderEmail + "</td>";
                    emailTable += "<td>" + email.recipientEmail + "</td>";
                    emailTable += "<td>" + email.emailSubject + "</td>";
                    emailTable += "<td>" + email.emailContent + "</td>";
                    emailTable += "<td>" + email.timeSent + "</td>";
                    emailTable += "</tr>";

                })

                emailTable += "</table>"

                document.getElementById("inbox").innerHTML = emailTable;

            })

        }

        fetchEmails();

        setInterval(fetchEmails, 60000);

    </script>

</body>
</html>