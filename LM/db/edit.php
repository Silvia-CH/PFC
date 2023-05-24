<?php
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
$valores = [];

foreach ($nameColumns as $columna) {
    echo "$columna[0]". $_POST[$columna[0]];
    $valores += [ "$columna[0]" => $_POST[$columna[0]] ];
}

if ($tabla == 'usuario') {
    $_SESSION['usuario'] = $valores;
}

require_once('database.php');
$database = new Database();
$database->update($valores['id'], $_GET['tabla'], $nameColumns, $numColumns, $valores);
header('Location: ../private/index.php?tabla='.$_GET['tabla']);
?>