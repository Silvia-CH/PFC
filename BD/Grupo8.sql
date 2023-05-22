-- DROP DATABASE pfc_libros;
CREATE DATABASE IF NOT EXISTS pfc_libros;
USE pfc_libros;

CREATE TABLE IF NOT EXISTS libro (
    id INT(11) NOT NULL AUTO_INCREMENT,
    isbn VARCHAR(13),
    titulo VARCHAR(45),
    editorial VARCHAR(45),
    sinopsis TEXT,
    PRIMARY KEY (id),
    UNIQUE (isbn)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS autor (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45),
    pseudonimo VARCHAR(30) DEFAULT NULL,
    UNIQUE (pseudonimo),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS genero (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45),
    tipo VARCHAR(45),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS contenido_multimedia (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45),
    tipo VARCHAR(45),
    libro_id INT(11),
    PRIMARY KEY (id),
	FOREIGN KEY (libro_id) REFERENCES libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS foro (
    id INT(11) NOT NULL AUTO_INCREMENT,
    libro_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (libro_id) REFERENCES libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS rol (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS usuario (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nick VARCHAR(20),
    contraseña VARCHAR(45),
    email VARCHAR(45),
    rol_id INT(11),
    UNIQUE (email),
    UNIQUE (nick),
    PRIMARY KEY (id),
	FOREIGN KEY (rol_id) REFERENCES rol (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS comentario (
    id INT(11) NOT NULL AUTO_INCREMENT,
    texto TEXT,
    foro_id INT(11),
    usuario_id INT(11),
    PRIMARY KEY (id),
	FOREIGN KEY (foro_id) REFERENCES foro (id),
	FOREIGN KEY (usuario_id) REFERENCES usuario (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS autor_has_libro (
    autor_id INT(11) NOT NULL,
    libro_id INT(11) NOT NULL,
    PRIMARY KEY (autor_id, libro_id),
    FOREIGN KEY (autor_id) REFERENCES autor (id),
    FOREIGN KEY (libro_id) REFERENCES libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS libro_has_genero (
    libro_id INT(11) NOT NULL,
    genero_id INT(11) NOT NULL,
    PRIMARY KEY (libro_id, genero_id),
    FOREIGN KEY (libro_id) REFERENCES libro (id),
    FOREIGN KEY (genero_id) REFERENCES genero (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS usuario_has_libro (
    usuario_id INT(11) NOT NULL,
    libro_id INT(11) NOT NULL,
    PRIMARY KEY (usuario_id, libro_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario (id),
    FOREIGN KEY (libro_id) REFERENCES libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

/* INSERCION TABLA libro */
INSERT INTO libro VALUES (NULL, '9788491048961', 'Jane Eyre','Alianza', 'Dueña de un singular temperamento desde su complicada infancia de huérfana, primero a cargo de una tía poco cariñosa y después en la escuela Lowood, Jane Eyre logra el puesto de institutriz en Thornfield Hall para educar a la hija de su atrabiliario y peculiar dueño, el señor Rochester. Poco a poco, el amor irá tejiendo su red entre ellos, pero la casa y la vida de Rochester guardan un estremecedor y terrible misterio.');
INSERT INTO libro VALUES (NULL, '9788498386264', 'Percy Jackson y el ladrón del rayo', 'Salamandra', '¿Qué pasaría si un día descubrieras que, en realidad, eres hijo de un dios griego que debe cumplir una misión secreta? Pues eso es lo que le sucede a Percy Jackson, que a partir de ese momento se dispone a vivir los acontecimientos más emocionantes de su vida. Expulsado de seis colegios, Percy padece dislexia y dificultades para concentrarse, o al menos ésa es la versión oficial. Objeto de burlas por inventarse historias fantásticas, ni siquiera él mismo acaba de creérselas hasta el día que los dioses del Olimpo le revelan la verdad: Percy es nada menos que un semidiós, es decir, el hijo de un dios y una mortal. Y como tal ha de descubrir quién ha robado el rayo de Zeus y así evitar que estalle una guerra entre los dioses.');
INSERT INTO libro VALUES (NULL, '9788401337550', 'Dime quién soy', 'Plaza & Janes', 'Un periodista investiga la apasionante vida de una antepasada suya, una mujer que vivió intensamente el siglo XX desde los convulsos años de la república hasta la caída del muro de Berlín.');
INSERT INTO libro VALUES (NULL, '9788417910143', 'Persépolis', 'Reservoir Books', 'Persépolis nos cuenta la revolución islámica iraní vista desde los ojos de una niña que asiste atónita al cambio profundo que experimentan su país y su familia, mientras ella debe aprender a llevar el velo. Intensamente personal y profundamente político, el relato autobiográfico de Marjane Satrapi examina qué significa crecer en un ambiente de guerra y represión política.');
INSERT INTO libro VALUES (NULL, '9780714898704', 'Historia del arte', 'Phaidon', 'Es uno de los libros dedicados al arte más famosos y populares nunca escritos y ha sido un best-seller durante medio siglo. Durante cinco décadas no ha tenido ningún rival como introducción al arte en su totalidad, abarcando desde las pinturas rupestres primitivas hasta el arte experimental contemporáneo.');
INSERT INTO libro VALUES (NULL, '9788412182279', 'Rimas', 'Anaya', 'Las Rimas de Bécquer es la colección poética más importante del siglo XIX. Su éxito, en gran medida, se debe a la livianidad de sus textos, alejándose así del tono recargado que caracteriza a este género.');

/* INSERCION TABLA autor */
INSERT INTO autor VALUES (NULL, 'Charlotte Brontë', DEFAULT);
INSERT INTO autor VALUES (NULL, 'Rick Riordan', DEFAULT);
INSERT INTO autor VALUES (NULL, 'Julia Navarro', DEFAULT);
INSERT INTO autor VALUES (NULL, 'Marjane Satrapi', DEFAULT);
INSERT INTO autor VALUES (NULL, 'E.H. Gombrich', DEFAULT);
INSERT INTO autor VALUES (NULL, 'A. Bécquer', DEFAULT);

/* INSERCION TABLA genero */
INSERT INTO genero VALUES (NULL, 'Poesía', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Juvenil', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Romantica', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Ciencia Ficción', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Fantasia', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Policiaca', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Histórica', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Ciencia', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Psicología', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Arte', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Cómic', 'Cómic');



/* TABLA DE contenido multimedia*/
INSERT INTO contenido_multimedia VALUES (NULL, 'Jane Eyre (2011)', 'Película', '1');
INSERT INTO contenido_multimedia VALUES (NULL, 'Percy Jackson y el ladrón del rayo (2010)', 'Película', '2');
INSERT INTO contenido_multimedia VALUES (NULL, 'Dime quién soy (2020)', 'Miniserie', '3');
INSERT INTO contenido_multimedia VALUES (NULL, 'Persépolis (2007)', 'Película', '4');
INSERT INTO contenido_multimedia VALUES (NULL, 'Historia del arte, Gombrich', 'Youtube', '5');
INSERT INTO contenido_multimedia VALUES (NULL, 'Bécquer y las brujas (2019)', 'Película', '6');

/* TABLA FORO */
INSERT INTO foro VALUES (NULL, '1');
INSERT INTO foro VALUES (NULL, '2');
INSERT INTO foro VALUES (NULL, '3');
INSERT INTO foro VALUES (NULL, '4');
INSERT INTO foro VALUES (NULL, '5');
INSERT INTO foro VALUES (NULL, '6');

/* TABLA ROL */
INSERT INTO rol VALUES (NULL, 'admin');
INSERT INTO rol VALUES (NULL, 'usuario');

/* TABLA USUARIO*/
INSERT INTO usuario VALUES (NULL, 'PEPITA22', 'Rr.2kjkh', 'pepita22@gmail.com', '2');
INSERT INTO usuario VALUES (NULL, 'LECTOR123', 'Dc4=kjhkjh', 'lector2222@gmail.com', '2');
INSERT INTO usuario VALUES (NULL, 'CAPIPERCY', 'Cc3,ijkij', 'capipercy@gmail.com', '2');
INSERT INTO usuario VALUES (NULL, 'TeatroYmás', 'Bb2.uiop', 'teatroymas@gmail.com', '2');
INSERT INTO usuario VALUES (NULL, 'ADMINISTRADOR', 'Aa1_qwer', 'adminbiblio@gmail.com', '1');

/* TABLA COMENTARIO */
INSERT INTO comentario VALUES (NULL, 'La historia de la escritora basada en sus experiencias reales da mucho que pensar. ¿Quién iba imaginar que esta historieta tuviera tanto que contar?', '4', '1');
INSERT INTO comentario VALUES (NULL, 'A mis niños les ha encantado el cuento de "Pupi y sus amigos". ¡Muchas gracias a todos los que me lo han recomendado!', '5', '2');
INSERT INTO comentario VALUES (NULL, '¡No me esperaba ese giro en la trama justo al terminar el libro! Que momentos tan angustiosos he tenido...', '2', '3');
INSERT INTO comentario VALUES (NULL, 'Aunque este poema apenas llegue a cuatro versos, su intención está muy clara. ¡Que arte!', '6', '4');

/* TABLA autor_HAS_libro */
INSERT INTO autor_has_libro VALUES ('1','1');
INSERT INTO autor_has_libro VALUES ('2','2');
INSERT INTO autor_has_libro VALUES ('3','3');
INSERT INTO autor_has_libro VALUES ('4','4');
INSERT INTO autor_has_libro VALUES ('5','5');
INSERT INTO autor_has_libro VALUES ('6','6');

/* TABLA libro_HAS_genero*/
INSERT INTO libro_has_genero VALUES ('1', '3');
INSERT INTO libro_has_genero VALUES ('2', '2');
INSERT INTO libro_has_genero VALUES ('3', '7');
INSERT INTO libro_has_genero VALUES ('4', '11');
INSERT INTO libro_has_genero VALUES ('1', '10');

/* TABLA usuario_HAS_libros*/
INSERT INTO usuario_has_libro VALUES ('1', '1');
INSERT INTO usuario_has_libro VALUES ('2', '3');
