<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/styleLogin.css?ver=1.1">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../img/BT.ico">
</head>

<body>
    <nav>
        <ul class="nav_izquierdo">
            <a href="../php/index.php">
                <img id="icono" src="../img/logoV2.jpg">
            </a>
            <a href="../php/contacto.php">
                <li><i class="fas fa-envelope-open-text"></i> Contacto</li>
            </a>
            <li></li>
        </ul>
        <ul class="nav_centro">
            <li class="buscador"><input type="search" placeholder="Buscar..."><i class="fas fa-search"></i></li>
        </ul>
        <ul class="nav_derecho">
            <a href="../php/foro.php">
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
                echo '<a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
                </div>
                </div>';
            } else {
                echo '<a href="login.php">
                <li class="usuario"><i class="fas fa-user"></i> Iniciar Sesión</li></a>';
            }
            ?>
        </ul>
    </nav>

    <div class="mainDiv">
        <main>
            <form id="login-form" action="comprobar.php?form=0" method="post">
                <div class="titulo">
                    <h2>Iniciar Sesión</h2>
                </div>
                <div class="centroForm">
                    <input class="texto" type="text" name="email" placeholder="E-Mail" autofocus required>
                    <input class="texto" type="password" name="contraseña" placeholder="Contraseña" required>
                </div>
                <div class="midForm" onclick="verContraseña(iniciarSesion)">
                    <img class="eye" src="../img/view.png">
                    <p>Mostrar contraseña</p>
                </div>
                <div class="botonDiv">
                    <button class="boton" type="submit" onclick="validar(iniciarSesion)">Iniciar Sesión</button>
                </div>
                <div class="enlaceDiv">
                    <a href="#" onclick="mostrarIS()">¿Aún no estás registrado?</a>
                </div>
            </form>

            <form id="register-form" action="comprobar.php?form=1" method="post">
                <div class="titulo">
                    <h2>Regístrate</h2>
                </div>
                <div class="centroForm">
                    <input class="texto" type="text" name="nick" placeholder="Nickname" autofocus required>
                    <input class="texto" type="text" name="email" placeholder="E-Mail" required>
                    <input class="texto" type="password" name="contraseña" placeholder="Contraseña" required>
                    <input class="texto" type="password" name="compContraseña" placeholder="Comprobar Contraseña" required>
                </div>
                <div class="midForm" onclick="verContraseña(registrarse)">
                    <img class="eye" src="../img/view.png">
                    <p>Mostrar contraseña</p>
                </div>
                <div class="botonDiv">
                    <button class="boton" type="submit" onclick="validar(registrarse)">Registrarse</button>
                </div>
                <div class="enlaceDiv">
                    <a href="#" onclick="mostrarR()">¿Ya tienes cuenta?</a>
                </div>
            </form>
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
<script src="app.js"></script>

</html>