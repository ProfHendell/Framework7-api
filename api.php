<?php

require_once __DIR__ . '/vendor/autoload.php';

use Bulk\Database;

$db = new Database();

// Se crea una variable $json con un arreglo vacio.
$json = [];

// Dentro de Json se crea un indice de nombre datos
// Con valor Prueba
$json['datos'] = "Prueba";
$json['datos2'] = "Prueba2";

// arreglos multidimencionales.
$json['array'] = [
    'foo' => 'bar',
    'bar' => 'foo'
];

// Se imprime usando la funcion json_encode
// con el valor de $json usando el modificador PRTY print

echo json_encode($json, JSON_PRETTY_PRINT);
