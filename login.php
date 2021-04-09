<?php

require_once __DIR__ . '/vendor/autoload.php';

use Bulk\Database;

$db = new Database();

$correo = $_GET['correo'];
$password = $_GET['password'];

$sql = "SELECT * FROM usuarios WHERE correo = :correo";

$stmt = $db->prepare_fetch_result($sql, [
    'correo' => $correo
]);

// Se crea un buffer para imprimirlo luego con la función json_encode
$json = [];

// Se comprueba la contraseña del parámetro y la contraseña de la base de datos, si es verdadero es login correcto.
if ($stmt && password_verify($password, $stmt->password)) {
    $json['valid'] = true;
} else {
    $json['valid'] = false;
    $json['error'] = 'Usuario o contraseña incorrecta';
}

echo json_encode($json, JSON_PRETTY_PRINT);
