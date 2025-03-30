<?php

    $mysql = new mysqli(
        "localhost",
        "root",
        "",
        "email_db"
    );

    if (!$mysql) {
        echo "Oops not connected!<br>";
    }

?>