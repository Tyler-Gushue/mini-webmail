<?php

    session_start();

    if (isset($_SESSION['email'])) {

        header("Location: inbox.php");
        exit();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="body">

    <div class="loginArea">

        <h1>Sign In Here</h1>

        <form id="loginForm">

            <input type="hidden" id="action" name="action" value="login">

            <input type="text" class="input" id="email" placeholder="Email" name="email"><br>
            <input type="password" class="input" id="password" placeholder="Password" name="password">

            <input type="submit" class="button" value="Login">
        </form>

    </div> 
    
    <script>

        // I learned how to do this from A3 specifically views/add_joke.html

        document.getElementById('loginForm').addEventListener('submit', function(e) {

            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('../api/login.php', {

                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })

            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'inbox.php';
                } else {
                    alert('Error logging in');
                }
            })
            .catch(err => {
                console.error('Error:', err);
                alert('Error logging in');
            });

        })

    </script>

</body>
</html>