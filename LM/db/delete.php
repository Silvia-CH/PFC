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
            switch ($tabla) {
                case 'autor':
                    $database->delete($id, 'autor_has_libro', 'autor_id');
                    break;
                case 'genero':
                    $database->delete($id, 'libro_has_genero', 'genero_id');
                    break;
                case 'libro':
                    $database->delete($id, 'autor_has_libro', 'libro_id');
                    $database->delete($id, 'libro_has_genero', 'libro_id');
                    $database->delete($id, 'usuario_has_libro', 'libro_id');
                    $database->delete($id, 'contenido_multimedia', 'libro_id');
                    $foroID = $database->getById($id, 'foro', 'libro_id');
                    $database->delete($foroID['id'], 'comentario', 'foro_id');
                    $database->delete($id, 'foro', 'libro_id');
                    break;
                case 'usuario':
                    $database->delete($id, 'usuario_has_libro', 'usuario_id');
                    $database->delete($id, 'comentario', 'usuario_id');
                    break;
                case 'rol':
                    $database->delete($id, 'usuario', 'rol_id');
                    break;
                case 'foro':
                    $database->delete($id, 'comentario', 'foro_id');
                    break;
            }
            $database->delete($id, $tabla, 'id');
        }
    } else {
        if (isset($_GET[$_GET['idUno']]) && isset($_GET[$_GET['idUno']])) {
            $nombreUno = $_GET['idUno'];
            $nombreDos = $_GET['idDos'];
            $idUno = $_GET[$nombreUno];
            $idDos = $_GET[$nombreDos];
            require_once('database.php');
            $database = new Database();
            $database->deleteRelationTable($idUno, $idDos, $tabla, $nombreUno, $nombreDos);
        }
    }
    header("Location: ../private/index.php?tabla=" . $tabla . "");
} else {
    echo '<html>';
    echo '<h1>ERROR 404</h1>';
    echo '</html>';
}
