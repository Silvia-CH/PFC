<?php
require_once('../database.php');
$database = new Database();
$tablaResul = $database->getAll('genero');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>GÉNERO</title>
    <link rel='stylesheet' href='../style/style.css?ver=1.1'>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tablaResul as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['tipo'] . "</td>";
                echo '<td> <a href="../delete.php?id=' . $row['id'] . '&table=genero">Eliminar</a></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>