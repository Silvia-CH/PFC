<?php
require_once('../database.php');
$database = new Database();
$tablaResul = $database->getAll('usuario');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>USUARIO</title>
    <link rel='stylesheet' href='../style/style.css?ver=1.1'>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nick</th>
                <th>Contraseña</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tablaResul as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nick'] . "</td>";
                echo "<td>" . $row['contraseña'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo '<td> <a href="../delete.php?id=' . $row['id'] . '&table=usuario">Eliminar</a></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>