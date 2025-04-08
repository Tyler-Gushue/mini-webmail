    <?php

        session_start();

        if (!isset($_SESSION['email'])) {

            header("Location: login.php");
            exit();

        }

        require_once("../templates/header.php");

    ?>

    <div class="sendEmail">

        <form id="sendMailForm">

            <input type="hidden" id="action" name="action" value="sendEmail">

            <label for="recipient" class="emailLabel">Recipient Email</label><br>
            <input type="text" class="emailBox" id="recipient" name="recipient"><br>

            <label for="subject" class="emailLabel">Subject</label><br>
            <input type="text" class="emailBox" id="subject" name="subject">

            <label for="content" class="emailLabel">Message</label><br>
            <textarea name="content" class="emailBox" id="content" rows="15" cols="50"></textarea>

            <input type="submit" class="button" value="Send">

        </form>

        <script>

            // I learned how to do this from A3 specifically views/add_joke.html

            document.getElementById('sendMailForm').addEventListener('submit', function(e) {

                e.preventDefault();

                const action = document.getElementById('action').value;
                const recipient = document.getElementById('recipient').value;
                const subject = document.getElementById('subject').value;
                const content = document.getElementById('content').value;

                fetch('../api/emails.php', {

                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: action,
                        recipient: recipient,
                        subject: subject,
                        content: content
                    })

                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('Email sent successfully!');
                        window.location.href = 'inbox.php';
                    } else {
                        alert('Error sending email: ' + data.error);
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                    alert('Error sending email');
                });

            })

        </script>

    </div>

<?php 
    require_once("../templates/footer.php")
?>