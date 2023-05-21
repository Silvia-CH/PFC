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
            require_once('../db/database.php');
            $database = new Database();
            $nameColumns = $database->getColumns($tabla);
            $valor = $database->getById($id, $tabla);
        }
    } else {
        if (isset($_GET[$_GET['idUno']]) && isset($_GET[$_GET['idUno']])) {
            $nombreUno = $_GET['idUno'];
            $nombreDos = $_GET['idDos'];
            $idUno = $_GET[$nombreUno];
            $idDos = $_GET[$nombreDos];
            require_once('database.php');
            require_once('../db/database.php');
            $database = new Database();
            $nameColumns = $database->getColumns($tabla);
            $tablaResul = $database->getByIdRelations($idUno, $idDos, $tabla, $nombreUno, $nombreDos);
        }
    }
} else {
    echo '<html>';
    echo '<h1>ERROR 404</h1>';
    echo '</html>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel='stylesheet' href='styleForm.css?ver=1.2'>
</head>

<body>
    <?php
    echo '<form action="../db/edit.php?tabla=' . $_GET['tabla'] . '" method="POST">
        <h1>ACTUALIZAR ' . strtoupper($_GET['tabla']) . '</h1>
        <input type="hidden" value="' . $valor['id'] . 'name="id">';
    foreach ($nameColumns as $columna) {
        echo '<input type="text" value="' . $valor[$columna[0]] . '" name="' . $columna[0] . '" placeholder="Introduce ' . $columna[0] . '">';
    }
    echo '<button type="submit">Guardar</button>
    </form>';
    ?>
</body>

</html>