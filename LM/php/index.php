<?php
require_once('../db/database.php');
$database = new Database();
$generos = $database->getAll('genero');
$generosExistentes = ["fantasia", "romantica", "historica", "ciencia", "juvenil", "policiaca", "arte", "psicologia", "comic", "poesia", "ciencia ficcion"];

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="../style/style.css?ver=1.2">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../img/BT.ico">
</head>

<body>
    <nav>
        <ul class="nav_izquierdo">
            <a href="index.php">
                <img id="icono" src="../img/logoV2.jpg">
            </a>
            <a href="contacto.php">
                <li><i class="fas fa-envelope-open-text"></i> Contacto</li>
            </a>
            <li></li>
        </ul>
        <ul class="nav_centro">
            <li class="buscador"><input type="search" placeholder="Buscar..."><i class="fas fa-search"></i></li>
        </ul>
        <ul class="nav_derecho">
            <a href="foro.php">
                <li>Foro</li>
            </a>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo '<div class="user-profile">
                <li class="usuario" id="dropdownMenuLink">', $_SESSION['usuario']['nick'], '</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Ver perfil</a>
                <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Ajustes</a>';
                if ($_SESSION['usuario']['rol_id'] == 1) {
                    echo '<a class="dropdown-item" href="../private/index.php?tabla=bienvenido"><i class="fas fa-tools"></i></i> CRUD</a>';
                }
                echo '<a class="dropdown-item" href="../auth/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                </div>
                </div>';
            } else {
                echo '<a href="../auth/login.php">
                <li class="usuario"><i class="fas fa-user"></i> Iniciar Sesión</li></a>';
            }
            ?>
        </ul>
    </nav>
    <section id="generos">
        <?php
        /** 
         * Este for each recorre los datos de la tabla 'genero' y comprueba que 
         * solo se inserten los géneros especificados en el array $generosExistentes.
         * Además, evita las mayúsculas y tildes de la base da datos para los datos como nombres de clases de CSS
         */
        foreach ($generos as $row) {
            $temp = str_replace(array('á', 'é', 'í', 'ó', 'ú'), array('a', 'e', 'i', 'o', 'u'), strtolower($row['nombre']));
            if (in_array($temp, $generosExistentes)) {
                echo "<div class='" . $temp . "'><h3>" . $row['nombre'] . " </h3></div>";
            }
        }
        ?>
    </section>
    <br>
    <section id="boton">
        <button><strong>Ver todos los géneros</strong></button>
    </section>
    <footer>
        <address>
            <div>
                <p>Si quieres una forma más directa de contactarnos:</p>
                Email: hola@ejemplo.com
                <br>
                Teléfono: +34 777 77 77 77
            </div>
            <div>
                <p>Conócenos en...</p>
                <div class="redes">
                    <a href="https://twitter.com"> <i class="fab fa-twitter"></i></a>
                    <a href="https://telegram.org/"><i class="fab fa-telegram"></i></a>
                    <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </address>
    </footer>
</body>
</head>

</html>
