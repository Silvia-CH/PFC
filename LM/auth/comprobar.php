<?php
// 1. recoger los elementos del formulrio de login.php
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$form = $_GET['form'];

// 2. importar la clase database oara poder usar sus acciones
require_once('../db/database.php');

// 3. invocar funcion login de database.php
$database = new Database();

// si se está intentando iniciar sesión
if ($form == 0) {
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
    // si se está intentando registrarse
} elseif ($form == 1) {
    $nick = $_POST['nick'];
    $respuesta = $database->existeUser($nick, $contraseña);

    if ($respuesta != null) {
        header('Location: login.php');
    } else {
        $database->insertarUser($nick, $contraseña, $email);
        session_destroy();
        $respuesta = $database->login($email, $contraseña);
        session_start();
        $_SESSION['usuario'] = $respuesta;
        header('Location: ../php/index.php');
    }
}
