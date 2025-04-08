<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <header>

        <div class="nav1">

            <p class="exemail">EX-Email</p>

            <form method="GET" action="inbox.php">
                <input type="submit" class="navButton" value="Inbox">
            </form>

            <form method="GET" action="sentEmails.php">
                <input type="submit" class="navButton" value="Sent">
            </form>

            <form method="GET" action="sendEmail.php">
                <input type="submit" class="navButton" value="Compose">
            </form>

            <form method="GET" id="logout" action="../api/logout.php">
                <input type="submit" class="navButton" value="Logout">
            </form>

        </div>

    </header>