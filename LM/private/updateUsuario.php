<?php
session_start();
$id = $_SESSION['usuario']['id'];
$tabla = 'usuario';

require_once('../db/database.php');
$database = new Database();
$nameColumns = $database->getColumns($tabla);
$valor = $database->getById($id, $tabla, 'id');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel='stylesheet' href='../style/styleForm.css?ver=1.5'>
</head>

<body>
    <?php
    echo '<form action="../db/edit.php?tabla=' . $tabla . '" method="POST">
        <h1>Hola ' . $_SESSION['usuario']['nick'] . '</h1>
        <input type="hidden" value="' . $valor['id'] . '" name="id">
        <input type="hidden" value="' . $valor['rol_id'] . '" name="rol_id">';
    foreach ($nameColumns as $columna) {
        if ($columna[0] != 'id' && $columna[0] != 'rol_id') {
            echo '<input type="text" value="' . $valor[$columna[0]] . '" name="' . $columna[0] . '" placeholder="Introduce ' . $columna[0] . '">';
        }
    }
    echo '<button type="submit">Modificar</button>
    </form>';
    ?>
</body>

</html>