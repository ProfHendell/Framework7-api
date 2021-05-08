<?php

require_once __DIR__ . '/vendor/autoload.php';

use Bulk\Database;

header('Access-Control-Allow-Origin: *');

$db = new Database();

// GET - POST - AJAX
$nombre_carrera = $_GET['nombre_carrera'];
$anio_carrera = $_GET['anio_carrera'];

if ($nombre_carrera && $anio_carrera) {
    $sql = "INSERT INTO carreras (nombre_carrera, anio_carrera) VALUES (:nombre_carrera, :anio_carrera)";
    $stmt = $db->prepare_execute($sql, [
        'nombre_carrera' => $nombre_carrera,
        'anio_carrera' => $anio_carrera
    ]);
    $json = [];
    if ($stmt) {
        $json['ingreso'] =  true;
    } else {
        $json['ingreso'] = false;
    }
    echo json_encode($json);
} else {
    $json = [];
    $json['error'] = 'No se encontraron las variables';
    echo json_encode($json);
}
