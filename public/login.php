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
</head>
<body>
    <form method="POST" action="../api/login.php">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password">
        <input type="submit" value="Submit">
    </form>

    <?php

        if (isset($_SESSION['error'])) {

            echo "<h4>" . $_SESSION['error'] . "</h4>";

        }

    ?>

</body>
</html>