<?php
$sn = "localhost";
$dbuser = "root";
$dbpws = "";
$db = "inlogopdracht";

$dsn = "mysql:host=$sn;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpws);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("pdoection failed: " . $e->getMessage());
}
