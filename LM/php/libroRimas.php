<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleLibroRimas.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../img/BT.ico">
    <title>Rimas</title>
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
    <div>
        <main>
            <section id="main">
                <div id="foto">
                    <img src="../img/rimas.png" width="230px" height="350px">             
                </div>
                <div id="titulo">
                    <h1>RIMAS, G.A Bécquer</h1>
                </div>
                <div id="sinopsis">
                    <p>Las Rimas de Bécquer es la colección poética más importante del siglo XIX. Su éxito, 
                       en gran medida, se debe a la livianidad de sus textos, alejándose así del tono recargado 
                       que caracteriza a este género.</p>                 
                    <p>Si quieres saber más, aquí tienes info sobre su
                    <a href="https://www.filmaffinity.com/es/film715263.html">Documental</a></p>
                    <p>Añade a tu lista:</p>
                    <img class="favorito" src="../img/corazonvacio.png" width="30px" height="30px">   
                </div>
            </section>
        </main>
    </div>
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

</html>
