<?php
session_start();
$libro_id = 3;
$img = '../img/corazon_vacio.png';
$existe = false;

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];

    require_once('../db/database.php');
    $database = new Database();
    $generos = $database->getByIdRelation($libro_id, 'usuario_has_libro', 'libro_id');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleLibro.css?ver=1.2">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../img/BT.ico">
    <title>Dime quién soy</title>
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
                <li class="usuario" id="dropdownMenuLink">', $usuario['nick'], '</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="biblioteca.php"><i class="fas fa-user"></i> Ver perfil</a>
                <a class="dropdown-item" href="..\private\updateUsuario.php"><i class="fas fa-cog"></i> Ajustes</a>';
                if ($usuario['rol_id'] == 1) {
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
                    <img id="imagen" src="../img/dime_quien_soy.png">
                </div>
                <div id="texto">
                    <div id="titulo">
                        <h1>DIME QUIÉN SOY, Julia Navarro</h1>
                    </div>
                    <div id="sinopsis">
                        <p>Un periodista investiga la apasionante vida de una antepasada suya, una mujer que vivió
                            intensamente el siglo XX desde los convulsos años de la República hasta la Caída del muro
                            de Berlín.</p>
                        <p>Para saber más sobre esta intrigante historia, puedes ver la info de su
                            <a href="https://www.filmaffinity.com/es/film476767.html">Serie</a>
                        </p>
                        <p>Añade a tu lista:</p>
                        <?php
                        echo '<a class="favorito" ';
                        if (isset($_SESSION['usuario'])) {
                            if ($generos != null) {
                                foreach ($generos as $genero) {
                                    if ($genero[0] == $usuario['id'] && $genero[1] == $libro_id) {
                                        $existe = true;
                                    }
                                }
                                if ($existe) {
                                    $img = '../img/corazon_lleno.png';
                                    echo 'href="../db/deleteRelation.php?usuario_id=' . $usuario['id'] . '&libro_id=' . $libro_id . '"';
                                } else {
                                    $img = '../img/corazon_vacio.png';
                                    echo 'href="../db/saveRelation.php?usuario_id=' . $usuario['id'] . '&libro_id=' . $libro_id . '"';
                                }
                            }
                        } else {
                            echo 'href="../auth/login.php"';
                        }
                        echo '><img src="' . $img . '" width="30px" height="30px"></a>';
                        ?>
                    </div>
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