<?php
// Conexión a la base de datos (debes configurarla con tus datos)
$conexion = new mysqli('localhost', 'root', '', 'dosrios');

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener el mes y año del parámetro GET
$mes = $_GET['mes'];
$año = $_GET['año'];

// Consulta para obtener los turnos del mes y año actual
$sql = "SELECT fecha, turno FROM calendario WHERE MONTH(fecha) = $mes AND YEAR(fecha) = $año";
$resultado = $conexion->query($sql);

// Crear un array asociativo para almacenar los turnos por fecha
$turnos = array();
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $turnos[$fila['fecha']] = $fila['turno'];
    }
}

// Devolver los turnos en formato JSON
echo json_encode($turnos);

// Cerrar la conexión a la base de datos
$conexion->close();
?>