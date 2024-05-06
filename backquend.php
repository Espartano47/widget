<?php
// Incluir cualquier archivo necesario
require_once('include/load.php');


// datos del vapor de bleach and dye
$datos = find_all('consultas');

// Establecer el encabezado de respuesta para indicar que se devuelve JSON
header('Content-Type: application/json');

// Devolver los datos como JSON
echo json_encode($datos);
