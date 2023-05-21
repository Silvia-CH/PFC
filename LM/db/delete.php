<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['rol_id'] != 1) {
        header('Location: ..\php\index.php');
    }
} else {
    header('Location: ..\php\index.php');
}
if (isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];
    if (!str_contains($tabla, '_has_')) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            require_once('database.php');
            $database = new Database();
            $tablaResul = $database->delete($id, $tabla, 'id');
        }
    } else {
        if (isset($_GET[$_GET['idUno']]) && isset($_GET[$_GET['idUno']])) {
            $nombreUno = $_GET['idUno'];
            $nombreDos = $_GET['idDos'];
            $idUno = $_GET[$nombreUno];
            $idDos = $_GET[$nombreDos];
            require_once('database.php');
            $database = new Database();
            $tablaResul = $database->deleteRelationTable($idUno, $idDos, $tabla, $nombreUno, $nombreDos);
        }
    }
    header("Location: ../private/index.php?tabla=" . $tabla . "");
} else {
    echo '<html>';
    echo '<h1>ERROR 404</h1>';
    echo '</html>';
}
