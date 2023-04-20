<?php
require_once('../database.php');
$database = new Database();
$tablaResul = $database->getAll('libros');
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
                <th>ISBN</th>
                <th>titulo</th>
                <th>editorial</th>
                <th>sinopsis</th>
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
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>