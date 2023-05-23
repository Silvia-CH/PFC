<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleLibroPercyJackson.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../img/BT.ico">
    <title>Percy Jackson</title>
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
                    <img src="../img/percy_jackson_libro.png" width="300px" height="450px">             
                </div>
                <div id="titulo">
                    <h1>PERCY JACKSON Y EL LADRÓN DEL RAYO, Rick Riordan</h1>
                </div>
                <div id="sinopsis">                   
                    <p>Percy Jackson y el ladrón del rayo', 'Salamandra', '¿Qué pasaría si un día descubrieras que, 
                       en realidad, eres hijo de un dios griego que debe cumplir una misión secreta? Pues eso es lo 
                       que le sucede a Percy Jackson, que a partir de ese momento se dispone a vivir los acontecimientos 
                       más emocionantes de su vida. Expulsado de seis colegios, Percy padece dislexia y dificultades 
                       para concentrarse, o al menos ésa es la versión oficial. Objeto de burlas por inventarse historias 
                       fantásticas, ni siquiera él mismo acaba de creérselas hasta el día que los dioses del Olimpo le 
                       revelan la verdad: Percy es nada menos que un semidiós, es decir, el hijo de un dios y una mortal. 
                       Y como tal ha de descubrir quién ha robado el rayo de Zeus y así evitar que estalle una guerra 
                       entre los dioses.</p>
                    <p>Para saber más sobre esta aventura, puedes ver la info de su
                    <a href="https://www.filmaffinity.com/es/film441239.html">Película</a></p>
                    <p>Añade a tu lista:</p>
                    <img class="favorito" src="../img/corazon_vacio.png" width="30px" height="30px">   
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
