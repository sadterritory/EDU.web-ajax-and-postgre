<?php

$host = 'localhost';
$port = '5433';
$database = 'authDB';
$user = 'postgres';
$password = '9628117193Rk';

$connection = pg_connect("host = $host port = $port dbname = $database user = $user password = $password");

//include 'dbConnection.php';

if (!$connection) {
    echo "Failed to connect to PostgreSQL: " . pg_last_error();
} else {
    $_SESSION['connection'] = $connection;
}

$queryString = "SELECT * FROM users WHERE user_login = " . "'" . $_POST["login"] . "'" . " and user_pass = " . "'" . $_POST["password"] . "'" . ";";

$result = pg_query($connection, $queryString);

if (pg_num_rows($result) == 1) {
    echo "Successful login";
} else {
    echo $queryString;
}
