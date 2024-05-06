<?php
$time = microtime(true);

  require_once('../include/load.php');
  
  // Función para manejar las consultas y devolver resultados
  function handle_request($query) {
    switch ($query) {
      case 'byservidores':
        $result = find_all_by_category1('servidores',$_GET['categoria']);
        break;
      case 'camarabyservidor':
        $result = find_all_by_nvr('Camaras',$_GET['idnvr']);
        break;
      case 'offline':
        $result = find_all_by_offline($_GET['servidor']);
        break;
      case 'offlinebynvr':
        $result = find_all_by_offline_bynvr($_GET['nvr']);
        break;
      case 'users':
        $result = find_all($_GET['users']);
    }
    return $result;
  }
  
  // Obtener el parámetro 'consulta' de la URL
  $query_param = isset($_GET['consulta']) ? $_GET['consulta'] : null;
  

  // Manejar la solicitud y obtener el resultado
  $response = handle_request($query_param);

  // Salida del resultado en formato JSON
  header('Content-Type: application/json');

  echo json_encode( $response, JSON_PRETTY_PRINT);
//  echo json_encode($response);

