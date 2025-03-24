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

if (empty($_POST["login"]) || empty($_POST["oldPass"]) || empty($_POST["newPass"])) {
    echo "Поля не могут быть пустыми";
    exit;
}

$queryString = "SELECT * FROM users WHERE user_login = " . "'" . $_POST["login"] . "';";

$result = pg_query($connection, $queryString);

if (!$result) {
    echo "Error in SQL query: " . pg_last_error();
    exit;
} else if (pg_num_rows($result) == 0) {
    echo "Пользователя с таким именем не существует";
    exit;
} else {
    $queryString = "SELECT * FROM users WHERE user_login = '" . $_POST["login"] . "' and user_pass = '" . $_POST["oldPass"] . "';";
}

$passResult = pg_query($connection, $queryString);

if (pg_num_rows($passResult) == 0) {
    echo "Неверно введен старый пароль";
} else {
    $queryString = "UPDATE users SET user_pass = '" . $_POST["newPass"] . "' WHERE user_login = '" . $_POST["login"] . "';";
    $insertResult = pg_query($connection, $queryString);
    if (!$insertResult) {
        echo "Error in SQL query: " . pg_last_error();
    } else {
        echo "Successful reset";
    }
}