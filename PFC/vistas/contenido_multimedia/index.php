<?php
require_once('../database.php');
$database = new Database();
$tablaResul = $database->getAll('contenido_multimedia');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>ADMIN</title>
    <link rel='stylesheet' href='../style/style.css?ver=1.1'>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>tipo</th>
                <th>libro_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tablaResul as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['tipo'] . "</td>";
                echo "<td>" . $row['libro_id'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>