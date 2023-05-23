<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleContacto.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../img/BT.ico">
    <title>Contacto</title>
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

    <div class="mainNaside">
        <main>
            <header>
                <p>Contacto</p>

                <p>Si deseas preguntarnos sobre nuestra página web o quieres reportar un error, ¡estás en el lugar
                    apropiado!</p>
            </header>
            <section class="formulario">
                <form>
                    <label>Nombre <span>*</span></label>
                    <br>
                    <input type="text" placeholder="Ej: Pepito Pérez" autofocus required>
                    <br><br>
                    <label>Email <span>*</span></label>
                    <br>
                    <input type="email" placeholder="hola@ejemplo.com" required>
                    <br><br>
                    <label>Comentario <span>*</span></label>
                    <br>
                    <textarea placeholder="Escribe aquí..." required></textarea>
                    <br><br>
                    <input type="checkbox">
                    <label id="checkmark">¿Desea recibir información relevante a su correo?</label>
                    <br><br>
                    <button type="submit">Enviar Comentario</button>
                </form>
            </section>
        </main>

        <aside>
            <p id="novedades">NOVEDADES</p>
            <article class="noticias">
                <h5>
                    <a
                        href="https://www.planetadelibros.com/blog/actualidad/15/actualidad-premios/15/articulo/luz-gabas-premio-planeta-2022-y-cristina-campos-finalista/501">Ganadora
                        del Premio Planeta</a>
                </h5>
                <img src="../img/premio_planeta.jpg" alt="Ganadora del Premio Planeta">
                <p>La ganadora del Premio Planeta es Luz Gabás(derecha) y la finalista es Cristina Campos(izquierda). El
                    premio se lo lleva el libro "Lejos de Luisiana".</p>
            </article>
            <article class="noticias">
                <h5><a href="https://www.imdb.com/title/tt12324366/">TV Series: Percy Jackson</a></h5>
                <img src="../img/Percy_Jackson.jpg" alt="Percy Jackson and The Olympians">
                <p>La serie de televisión basada en la saga de libros escrita por Rick Riordian será adaptada y lanzada
                    para finales de 2023.</p>
            </article>
        </aside>
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
