<?php
session_start();
if (isset($_SESSION['usuario'])) {
    require_once('../db/database.php');
    $database = new Database();
    $libros = $database->getAll('libro');
    $relLibros = $database->getLibroUser($_SESSION['usuario']['id']);
} else {
    header('Location: ..\auth\login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../style/style.css?ver=1.9">
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
                <a class="dropdown-item" href="biblioteca.php"><i class="fas fa-user"></i> Ver perfil</a>
                <a class="dropdown-item" href="..\private\updateUsuario.php"><i class="fas fa-cog"></i> Ajustes</a>';
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
    <main>
        <?php
        $cont = 0;
        if ($relLibros != null) {
            do {
                foreach ($libros as $libro) {
                    if ($relLibros[$cont]['libro_id'] == $libro['id']) {
                        $img = str_replace(array('á', 'é', 'í', 'ó', 'ú', ' '), array('a', 'e', 'i', 'o', 'u', '_'), strtolower($libro['titulo']));
                        echo '<a href="libro_' . $img . '.php"><img class="libroImg" src="../img/' . $img . '.png"></a>';
                    }
                }
                $cont++;
            } while ($cont < sizeof($relLibros));
        } else {
            echo "<h1>NO HAY LIBROS</h1>";
        }
        /*foreach ($userLibro as $rel) {
            foreach ($libros as $libro) {
                if ($libro['id'] == $userLibro['libro_id']) {
                }
            }
        }*/
        ?>
    </main>
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