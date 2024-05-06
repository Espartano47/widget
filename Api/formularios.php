<?php
$time = microtime(true);

  require_once('../include/load.php');
  
  // Función para manejar las consultas y devolver resultados
  function handle_request($query) {
    switch ($query) {
      case 'libras':
        $result = find_all_by_table('libras_finishing');
        break;
      case 'Allformularios':
        $result = find_all_by_table('cabecera_participacion');
        break;
      case 'allempleados':
        $result = find_all_by_table('headcount');
        break;
      case 'entr_form':
        $result = find_all_ent_form((int)$_GET['id'],'entrenador_form');
        break;
      case 'test':
        $result = find_all_ent_form_paginacion((int)$_GET['id'],'participantes_form',(int)$_GET['pagina']);
        break;
      case 'part_form':
        $result = find_all_ent_form((int)$_GET['id'],'participantes_form');
        break;

      default:
        $result = array('error' => 'Consulta no válida');
    }
    return $result;
  }
  
  // Obtener el parámetro 'consulta' de la URL
  $query_param = isset($_GET['consulta']) ? $_GET['consulta'] : null;
  

  // Manejar la solicitud y obtener el resultado
  $response = handle_request($query_param);
  // Filtrar solo los campos deseados en el resultado
  if ($query_param == 'allempleados') {
    $filtered_result = array();
    foreach ($response as $formulario) {
      $filtered_formulario = array(
        'CODIGO' => $formulario['CODIGO'],
        'NOMBRE' => $formulario['NOMBRE'],
        'DEPARTAMENTO' => $formulario['DEPARTAMENTO'],
        'PUESTO' => $formulario['PUESTO'],
        'TURNO' => $formulario['TURNO'],
        // Agrega más campos deseados aquí según sea necesario
      );
      $filtered_result[] = $filtered_formulario;
    }
    $response = $filtered_result;
  }
  
  header('Content-Type: application/json');

  $time = microtime(true) - $time;

  echo json_encode( $response, JSON_PRETTY_PRINT);

