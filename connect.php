<?php

require_once  './includes/DB/Connection.php';

$host = 'mysql';
$user = 'laravel';
$pass = 'secret';
$dbname = 'phpmysql';

$conn = new Connection(
    $host,
    $user,
    $pass,
    $dbname
);
