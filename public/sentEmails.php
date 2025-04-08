<?php 

    session_start();

    if (!isset($_SESSION['email'])) {

        header("Location: login.php");
        exit();

    }

    require_once("../templates/header.php");

    ?>

<main>
    <div class="details">

        <?php 

            if (isset($_COOKIE['lastLogin'])) {

                echo "<h4>Welcome Back!  Last Login : " . $_COOKIE['lastLogin'] . "</h4>";

            }
            else {

                echo "<h4>Welcome to your inbox!</h4>";

            }

        ?>

    </div>

    <div id="emails">

    </div>

    <script>

        function fetchEmails() {

            fetch('../api/emails.php?action=sent', {
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

                document.getElementById("emails").innerHTML = emailTable;

            })

        }

        fetchEmails();

        setInterval(fetchEmails, 60000);

    </script>
</main>
<?php 
    require_once("../templates/footer.php")
?>