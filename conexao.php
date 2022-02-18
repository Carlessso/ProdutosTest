<?php
    $dsn = "pgsql:dbname=produtos; host=localhost";
    $user = "postgres";
    $password = "postgres";
    $pdo = new PDO ($dsn, $user, $password);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>