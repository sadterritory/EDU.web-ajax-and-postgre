<?php

$host = 'localhost';
$port = '5433';
$database = 'authDB';
$user = 'postgres';
$password = '9628117193Rk';

$connection = pg_connect("host = $host port = $port dbname = $database user = $user password = $password");

if (!$connection) {
    echo "Failed to connect to PostgreSQL: " . pg_last_error();
} else {
    $_SESSION['connection'] = $connection;
}

if (empty($_POST["newUserLog"]) || empty($_POST["newUserPass"])) {
    echo "Имя пользователя или пароль не могут быть пустыми";
    exit;
}

$queryString = "SELECT * FROM users WHERE user_login = " . "'" . $_POST["newUserLog"] . "';";

$result = pg_query($connection, $queryString);

if (!$result) {
    echo "Error in SQL query: " . pg_last_error();
    exit;
}

if (pg_num_rows($result) > 0) {
    echo $queryString;
} else {
    $queryString = "INSERT INTO users VALUES (DEFAULT, " . "'" . $_POST["newUserLog"] . "' ," . "'" . $_POST["newUserPass"] . "'" . ");";
    $insertResult = pg_query($connection, $queryString);
    if (!$insertResult) {
        echo "Error in SQL query: " . pg_last_error();
    } else {
        echo "Successful register";
    }
}