<?php
if (isset( $_GET['id'])&&isset($_GET['table'])) {
        $id = $_GET['id'];
        $table = $_GET['table'];
        require_once('database.php');
        $database = new Database();
        $tablaResul = $database->delete($id, $table);

        header("Location: $table/index.php");
    } else {
        echo '<html>';
        echo '<h1>ERROR 404</h1>';
        echo '</html>';
    }