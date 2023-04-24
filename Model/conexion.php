<?php

$host = 'localhost';
$dbname = 'gasolinera';
$user = '';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    die();
}
