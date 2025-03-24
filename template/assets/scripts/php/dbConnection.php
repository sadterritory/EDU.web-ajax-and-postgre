<?php
session_start();

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