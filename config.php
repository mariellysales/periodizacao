<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "periodizacao";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
} catch (Exception $erro) {
    echo "erro:" . $erro->getMessage();
}
