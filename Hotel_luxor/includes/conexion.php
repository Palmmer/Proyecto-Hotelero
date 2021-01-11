<?php
$host = 'localhost';
$user = 'root';
$db = 'hotel_luxor';
$pass = '';

try {
    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8', $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
}
