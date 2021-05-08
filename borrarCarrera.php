<?php

require_once __DIR__ . '/vendor/autoload.php';

use Bulk\Database;

header('Access-Control-Allow-Origin: *');

$db = new Database();

// GET - POST - AJAX
$id_carrera = $_GET['id_carrera'];

if ($id_carrera) {
    $sql = "DELETE FROM carreras WHERE id_carrera = :id_carrera";
    $stmt = $db->prepare_execute($sql, [
        'id_carrera' => $id_carrera
    ]);
    $json = [];
    if ($stmt) {
        $json['borrar'] =  true;
    } else {
        $json['borrar'] = false;
    }
    echo json_encode($json);
} else {
    $json = [];
    $json['error'] = 'No se encontraron las variables';
    echo json_encode($json);
}
