<?php
// 1. recoger los elementos del formulrio delogin.php
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

// 2. importar la clase database oara poder usar sus acciones
require_once('../db/database.php');

// 3. invocar funcion login de database.php
$database = new Database();
$respuesta = $database->login($email, $contraseña);

// 4. comprobar contenido de respuesta

if ($respuesta == null) {
    // ir al login
    header('Location: login.php');
} else {
    // comprobamos rol: si es admin te mando a admin y si es usuario te mando a usuario
    if ($respuesta['rol_id'] == 1) {
        // Le llevamos a admin
        session_start();
        $_SESSION['usuario'] = $respuesta;
        header('Location: ../private/index.php?tabla=bienvenido');
    } else if ($respuesta['rol_id'] == 2) {
        // Le llevamos al usuario
        session_start();
        $_SESSION['usuario'] = $respuesta;
        header('Location: ../php/index.php');
    } else {
        header('Location: login.php');
    }
}
