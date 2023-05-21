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
        require_once('../db/database.php');
        $database = new Database();
        $nameColumns = $database->getColumns($tabla);
        $numColumns = sizeof($nameColumns);
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
    <title>Insert</title>
    <link rel='stylesheet' href='../style/styleForm.css?ver=1.2'>
</head>

<body>
    <?php
    echo '<form action="../db/save.php?tabla=' . $_GET['tabla'] . '" method="POST">
        <h1>CREAR ' . strtoupper($_GET['tabla']) . '</h1>';
    foreach ($nameColumns as $columna) {
        echo '<input type="text" name="' . $columna[0] . '" placeholder="Introduce ' . $columna[0] . '">';
    }
    echo '<button type="submit">Enviar</button>
    </form>';
    ?>
</body>

</html>