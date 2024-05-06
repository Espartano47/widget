<?php
// Especificar que la respuesta será JSON
header('Content-Type: application/json');

// Incluir archivos necesarios para la base de datos y otras funciones
require_once('../include/load.php');

// Verifica si se recibió el formulario mediante la clave "add_server"

    // Recupera los valores enviados desde el formulario
    $Server_name = isset($_POST['Server-name']) ? remove_junk($db->escape($_POST['Server-name'])) : '';
    $Host = isset($_POST['Host']) ? remove_junk($db->escape($_POST['Host'])) : '';
    $categoria = isset($_POST['categoria']) ? remove_junk($db->escape($_POST['categoria'])) : '';
    $area = isset($_POST['area']) ? remove_junk($db->escape($_POST['area'])) : '';
    $departamento = isset($_POST['departamento']) ? remove_junk($db->escape($_POST['departamento'])) : '';
    $descripcion = isset($_POST['descripcion']) ? remove_junk($db->escape($_POST['descripcion'])) : '';
    $comentario = isset($_POST['comentario']) ? remove_junk($db->escape($_POST['comentario'])) : '';

    // Variables de éxito y mensaje
    $success = false;
    $message = '';

    // Realiza la operación de guardado en la base de datos
    $query = "INSERT INTO servidores (Server_Name, Server_Host,Categoria,area,departamento,descricion,comentario) 
              VALUES ('{$Server_name}', '{$Host}', '{$categoria}', '{$area}', '{$departamento}', '{$descripcion}', '{$comentario}')";
    
    // Ejecuta la consulta y verifica si fue exitosa
    if ($db->query($query)) {
        $success = true;
        $message = 'Operación exitosa';
    } else {
        $message = 'Hubo un error al guardar el servidor';
    }

    // Devuelve la respuesta JSON
    echo json_encode(['success' => $success, 'message' => $message]);

