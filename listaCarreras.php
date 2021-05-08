<?php

require_once __DIR__ . '/vendor/autoload.php';

header('Access-Control-Allow-Origin: *');

use Bulk\Database;

$db = new Database();

$sql = "SELECT * FROM carreras";
$stmt = $db->prepare_fetch_all($sql);
$json = [];

if ($stmt) {
    $json = $stmt;
} else {
    $json['error'] = 'Usuario o contraseña incorrecta';
}

echo json_encode($json, JSON_PRETTY_PRINT);
