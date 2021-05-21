<?php

require_once __DIR__ . '/vendor/autoload.php';

header('Access-Control-Allow-Origin: *');

use Bulk\Database;

$db = new Database();

// GET - POST - AJAX
$nombre_carrera = $_GET['nombre_carrera'];

$sql = "SELECT * FROM carreras WHERE nombre_carrera LIKE CONCAT('%',:nombre_carrera,'%') LIMIT 0, 5";
$stmt = $db->prepare_fetch_all($sql, [
    "nombre_carrera" => $nombre_carrera
]);

$json = [];

if ($stmt) {
    $json = $stmt;
} else {
    $json['error'] = 'No se encontraron datos';
}

echo json_encode($json, JSON_PRETTY_PRINT);
