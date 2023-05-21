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
    if ($_GET['tabla'] != 'bienvenido') {
        $tabla = $_GET['tabla'];
        require_once('../db/database.php');
        $database = new Database();
        $tablaResul = $database->getAll($tabla);
        $nameColumns = $database->getColumns($tabla);
        $numColumns = sizeof($nameColumns);
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
    <title>ADMINISTRACIÓN</title>
    <link rel='stylesheet' href='../style/styleVistas.css?ver=1.4'>
</head>

<body>
    <aside>
        <ul>
            <a href="index.php?tabla=autor">
                <li>AUTOR</li>
            </a>
            <a href="index.php?tabla=autor_has_libro">
                <li>AUTOR HAS LIBRO</li>
            </a>
            <a href="index.php?tabla=comentario">
                <li>COMENTARIO</li>
            </a>
            <a href="index.php?tabla=contenido_multimedia">
                <li>CONTENIDO MULTIMEDIA</li>
            </a>
            <a href="index.php?tabla=foro">
                <li>FORO</li>
            </a>
            <a href="index.php?tabla=genero">
                <li>GÉNERO</li>
            </a>
            <a href="index.php?tabla=libro">
                <li>LIBRO</li>
            </a>
            <a href="index.php?tabla=libro_has_genero">
                <li>LIBRO HAS GENERO</li>
            </a>
            <a href="index.php?tabla=rol">
                <li>ROL</li>
            </a>
            <a href="index.php?tabla=usuario">
                <li>USUARIO</li>
            </a>
            <a href="index.php?tabla=usuario_has_libro">
                <li>USUARIO HAS LIBRO</li>
            </a>
        </ul>
        <div class="login">
            <a href="..\php\index.php">
                <li>Volver a la página principal</li>
            </a>
            <a href="..\auth\logout.php">
                <li>Cerrar Sesión</li>
            </a>
        </div>
    </aside>
    <main>
        <?php
        if ($_GET['tabla'] == 'bienvenido' || $_GET['tabla'] == null) {
            echo '<h1>BIENVENIDO</h1>';
        } else {
            echo '<h1>' . strtoupper($_GET['tabla']) . '</h1>
            <div id="divCrear"><a id="crear" href="create.php?tabla=' . $_GET['tabla'] . '">Crear ' . $_GET['tabla'] . '</a></div>
            <table>
            <thead>
                <tr>';
            foreach ($nameColumns as $column) {
                echo "<th>" . $column[0] . "</th>";
            }
            echo "<th>Acciones</th>";
            echo '</tr>
            </thead>
            <tbody>';
            foreach ($tablaResul as $row) {
                echo "<tr>";
                for ($i = 0; $i < $numColumns; $i++) {
                    echo '<td>' . $row[$i] . '</td>';
                }
                if (!str_contains($tabla, '_has_')) {
                    echo '<td> <a href="../db/delete.php?id=' . $row['id'] . '&tabla=' . $tabla . '">Eliminar</a>';
                    echo '<a href="update.php?id=' . $row['id'] . '&tabla=' . $tabla . '">Actualizar</a></td>';
                } else {
                    echo '<td> <a href="../db/delete.php?' . $nameColumns[0][0] . '=' . $row[0] . '&' . $nameColumns[1][0] . '=' . $row[1]
                        . '&tabla=' . $tabla . '&idUno=' . $nameColumns[0][0] . '&idDos=' . $nameColumns[1][0] . '">Eliminar</a></td>';
                }
                echo "</tr>";
            }
            echo '</tbody>
            </table>';
        }
        ?>
    </main>
</body>

</html>