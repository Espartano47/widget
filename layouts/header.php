<?php $user = current_user();$Categorias = find_all1('categories'); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (!empty($page_title))
        echo remove_junk($page_title);
        elseif(!empty($user))
        echo ucfirst($user['name']);
        else echo "";?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Theme style -->
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    /* Hace que el body ocupe toda la altura de la pantalla */
    overflow: hidden;
    /* Evita que el desenfoque se muestre fuera del cuerpo */
    position: relative;
    background-color: rgba(0, 0, 255, 0);
    /* Fondo azul transparente */

    font-size: 12px;

}

.background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: transparent;
    /* Fondo transparente */
    filter: blur(30px);
    /* Aplica el efecto de desenfoque */
    z-index: -1;
    /* Coloca el elemento detrás del contenido */
}

.content {
    width: 98%;
    /* Tamaño del contenido al 70% del ancho de la pantalla */
    height: 100%;
    /* Tamaño del contenido al 70% de la altura de la pantalla */
    padding: 30px;
    /* Relleno de 30px */
    border-radius: 10px;
    /* Bordes redondeados */
    background-color: rgba(225, 222, 230, 1);
    /* Fondo blanco con transparencia */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    /* Sombra */
    /*aliniar a la derecha*/
}

/* Estilos para el tab menu */
.tab-menu {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #fff;
    box-shadow: 0px -1px 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
}

.tab-menu-item {
    margin: 0 10px;
    cursor: pointer;
}

.tab-menu-item.active {
    font-weight: bold;
    /* Estilo visual para el tab activo */
}
</style>
<div class="tab-menu">
            <div class="tab-menu-item active" onclick="showTab(0)">General</div>
            <div class="tab-menu-item" onclick="showTab(1)">Utilidades</div>
            <div class="tab-menu-item" onclick="showTab(2)">Notificaciones</div>
</div>