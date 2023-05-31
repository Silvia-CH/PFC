<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ..\auth\login.php');
}
if (isset($_GET['usuario_id']) && isset($_GET['libro_id'])) {
    $tabla = 'usuario_has_libro';
    $usuario_id = $_GET['usuario_id'];
    $libro_id = $_GET['libro_id'];
    require_once('database.php');
    $database = new Database();
    $database->deleteRelationTable($usuario_id, $libro_id, $tabla, 'usuario_id', 'libro_id');
    header("Location: ../php/biblioteca.php");
} else {
    echo '<html>';
    echo '<h1>ERROR 404</h1>';
    echo '</html>';
}
