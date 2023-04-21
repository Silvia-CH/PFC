<?php
require_once('../database.php');
$database = new Database();
$tablaResul = $database->getAll('libro_has_genero');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>LIBRO HAS GENERO</title>
    <link rel='stylesheet' href='../../style/styleVistas.css?ver=1.1'>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Libro_id</th>
                <th>Generos_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tablaResul as $row) {
                echo "<tr>";
                echo "<td>" . $row['libro_id'] . "</td>";
                echo "<td>" . $row['genero_id'] . "</td>";
                echo '<td> <a href="../delete.php?id=' . $row['id'] . '&table=libro_has_genero">Eliminar</a></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>