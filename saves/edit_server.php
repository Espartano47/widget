<?php
// Especificar que la respuesta será JSON
header('Content-Type: application/json');

// Incluir archivos necesarios para la base de datos y otras funciones
require_once('../include/load.php');


    // Recupera los valores enviados desde el formulario
    $server_id = isset($_POST['inputId']) ? remove_junk($db->escape($_POST['inputId'])) : '';
    $Server_name = isset($_POST['name-input']) ? remove_junk($db->escape($_POST['name-input'])) : '';
    $Host = isset($_POST['Host']) ? remove_junk($db->escape($_POST['Host'])) : '';
    $descripcion = isset($_POST['descripcion']) ? remove_junk($db->escape($_POST['descripcion'])) : '';
    $departamento = isset($_POST['departamento']) ? remove_junk($db->escape($_POST['departamento'])) : '';
    $area = isset($_POST['area']) ? remove_junk($db->escape($_POST['area'])) : '';

    // Variables de éxito y mensaje
    $success = false;
    $message = '';

    // Verifica si se ha proporcionado un ID de servidor válido
    if ($server_id) {
        // Realiza la operación de actualización en la base de datos
        $query = "UPDATE servidores 
                  SET Server_Name = '{$Server_name}', Server_Host = '{$Host}', descricion = '{$descripcion}', departamento = '{$departamento}', area = '{$area}'
                  WHERE ID = '{$server_id}'";

        // Ejecuta la consulta y verifica si fue exitosa
        if ($db->query($query)) {
            $success = true;
            $message = 'Operación exitosa: Servidor editado con éxito.';
        } else {
            $message = 'Hubo un error al editar el servidor.';
        }
    } else {
        $message = 'ID de servidor no proporcionado o inválido.';
    }

    // Devuelve la respuesta JSON
    echo json_encode(['success' => $success, 'message' => $message]);
