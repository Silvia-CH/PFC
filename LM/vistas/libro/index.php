<?php
require_once('../database.php');
$database = new Database();
$tablaResul = $database->getAll('libro');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>LIBRO</title>
    <link rel='stylesheet' href='../../style/styleVistas.css?ver=1.1'>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Titulo</th>
                <th>Editorial</th>
                <th>Sinopsis</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tablaResul as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['isbn'] . "</td>";
                echo "<td>" . $row['titulo'] . "</td>";
                echo "<td>" . $row['editorial'] . "</td>";
                echo "<td>" . $row['sinopsis'] . "</td>";
                echo '<td> <a href="../delete.php?id=' . $row['id'] . '&table=libro">Eliminar</a></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>