DROP DATABASE pfc_libros;
CREATE DATABASE IF NOT EXISTS pfc_libros;
USE pfc_libros;

CREATE TABLE IF NOT EXISTS 18_libro (
    id INT(11) NOT NULL AUTO_INCREMENT,
    isbn VARCHAR(13),
    titulo VARCHAR(45),
    editorial VARCHAR(45),
    sinopsis TEXT,
    PRIMARY KEY (id),
    UNIQUE (isbn)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_autor (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45),
    pseudonimo VARCHAR(30) DEFAULT NULL,
    UNIQUE (pseudonimo),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_genero (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45),
    tipo VARCHAR(45),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_contenido_multimedia (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45),
    tipo VARCHAR(45),
    libro_id INT(11),
    PRIMARY KEY (id),
	FOREIGN KEY (libro_id) REFERENCES 18_libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_foro (
    id INT(11) NOT NULL AUTO_INCREMENT,
    libro_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (libro_id) REFERENCES 18_libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_rol (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_usuario (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nick VARCHAR(20),
    contrasena VARCHAR(45),
    email VARCHAR(45),
    rol_id INT(11),
    UNIQUE (email),
    UNIQUE (nick),
    PRIMARY KEY (id),
	FOREIGN KEY (rol_id) REFERENCES 18_rol (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_comentario (
    id INT(11) NOT NULL AUTO_INCREMENT,
    texto TEXT,
    foro_id INT(11),
    usuario_id INT(11),
    PRIMARY KEY (id),
	FOREIGN KEY (foro_id) REFERENCES 18_foro (id),
	FOREIGN KEY (usuario_id) REFERENCES 18_usuario (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_autor_has_libro (
    autor_id INT(11) NOT NULL,
    libro_id INT(11) NOT NULL,
    PRIMARY KEY (autor_id, libro_id),
    FOREIGN KEY (autor_id) REFERENCES 18_autor (id),
    FOREIGN KEY (libro_id) REFERENCES 18_libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_libro_has_genero (
    libro_id INT(11) NOT NULL,
    genero_id INT(11) NOT NULL,
    PRIMARY KEY (libro_id, genero_id),
    FOREIGN KEY (libro_id) REFERENCES 18_libro (id),
    FOREIGN KEY (genero_id) REFERENCES 18_genero (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS 18_usuario_has_libro (
    usuario_id INT(11) NOT NULL,
    libro_id INT(11) NOT NULL,
    PRIMARY KEY (usuario_id, libro_id),
    FOREIGN KEY (usuario_id) REFERENCES 18_usuario (id),
    FOREIGN KEY (libro_id) REFERENCES 18_libro (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

/* INSERCION TABLA libro */
INSERT INTO 18_libro VALUES (NULL, '9788491048961', 'Jane Eyre','Alianza', 'Duena de un singular temperamento desde su complicada infancia de huerfana, primero a cargo de una tia poco carinosa y despues en la escuela Lowood, Jane Eyre logra el puesto de institutriz en Thornfield Hall para educar a la hija de su atrabiliario y peculiar dueno, el senor Rochester. Poco a poco, el amor ira tejiendo su red entre ellos, pero la casa y la vida de Rochester guardan un estremecedor y terrible misterio.');
INSERT INTO 18_libro VALUES (NULL, '9788498386264', 'Percy Jackson y el ladron del rayo', 'Salamandra', '¿Que pasaria si un dia descubrieras que, en realidad, eres hijo de un dios griego que debe cumplir una mision secreta? Pues eso es lo que le sucede a Percy Jackson, que a partir de ese momento se dispone a vivir los acontecimientos mas emocionantes de su vida. Expulsado de seis colegios, Percy padece dislexia y dificultades para concentrarse, o al menos esa es la version oficial. Objeto de burlas por inventarse historias fantasticas, ni siquiera el mismo acaba de creerselas hasta el dia que los dioses del Olimpo le revelan la verdad: Percy es nada menos que un semidios, es decir, el hijo de un dios y una mortal. Y como tal ha de descubrir quien ha robado el rayo de Zeus y asi evitar que estalle una guerra entre los dioses.');
INSERT INTO 18_libro VALUES (NULL, '9788401337550', 'Dime quien soy', 'Plaza & Janes', 'Un periodista investiga la apasionante vida de una antepasada suya, una mujer que vivio intensamente el siglo XX desde los convulsos anos de la republica hasta la caida del muro de Berlin.');
INSERT INTO 18_libro VALUES (NULL, '9788417910143', 'Persepolis', 'Reservoir Books', 'Persepolis nos cuenta la revolucion islamica irani vista desde los ojos de una nina que asiste atonita al cambio profundo que experimentan su pais y su familia, mientras ella debe aprender a llevar el velo. Intensamente personal y profundamente politico, el relato autobiografico de Marjane Satrapi examina que significa crecer en un ambiente de guerra y represion politica.');
INSERT INTO 18_libro VALUES (NULL, '9780714898704', 'Historia del arte', 'Phaidon', 'Es uno de los libros dedicados al arte mas famosos y populares nunca escritos y ha sido un best-seller durante medio siglo. Durante cinco decadas no ha tenido ningun rival como introduccion al arte en su totalidad, abarcando desde las pinturas rupestres primitivas hasta el arte experimental contemporaneo.');
INSERT INTO 18_libro VALUES (NULL, '9788412182279', 'Rimas', 'Anaya', 'Las Rimas de Becquer es la coleccion poetica mas importante del siglo XIX. Su exito, en gran medida, se debe a la livianidad de sus textos, alejandose asi del tono recargado que caracteriza a este genero.');

/* INSERCION TABLA autor */
INSERT INTO 18_autor VALUES (NULL, 'Jane Eyre', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'Rick Riordan', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'Julia Navarro', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'Marjane Satrapi', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'E.H. Gombrich', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'A. Becquer', DEFAULT);

/* INSERCION TABLA genero */
INSERT INTO 18_genero VALUES (NULL, 'Poesia', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Juvenil', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Romantica', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Ciencia Ficcion', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Fantasia', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Policiaca', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Historica', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Ciencia', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Psicologia', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Arte', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Comic', 'Comic');


/* TABLA DE contenido multimedia*/
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Jane Eyre (2011)', 'Pelicula', '1');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Percy Jackson y el ladron del rayo (2010)', 'Pelicula', '2');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Dime quien soy (2020)', 'Miniserie', '3');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Persepolis (2007)', 'Pelicula', '4');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Historia del arte, Gombrich', 'Youtube', '5');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Becquer y las brujas (2019)', 'Pelicula', '6');

/* TABLA FORO */
INSERT INTO 18_foro VALUES (NULL, '1');
INSERT INTO 18_foro VALUES (NULL, '2');
INSERT INTO 18_foro VALUES (NULL, '3');
INSERT INTO 18_foro VALUES (NULL, '4');
INSERT INTO 18_foro VALUES (NULL, '5');
INSERT INTO 18_foro VALUES (NULL, '6');

/* TABLA ROL */
INSERT INTO 18_rol VALUES (NULL, 'admin');
INSERT INTO 18_rol VALUES (NULL, 'usuario');

/* TABLA USUARIO*/
INSERT INTO 18_usuario VALUES (NULL, 'PEPITA22', 'Rr.2kjkh', 'pepita22@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'LECTOR123', 'Dc4=kjhkjh', 'lector2222@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'CAPIPERCY', 'Cc3,ijkij', 'capipercy@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'TeatroYmas', 'Bb2.uiop', 'teatroymas@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'ADMINISTRADOR', 'Aa1_qwer', 'adminbiblio@gmail.com', '1');

/* TABLA COMENTARIO */
INSERT INTO 18_comentario VALUES (NULL, 'La historia de la escritora basada en sus experiencias reales da mucho que pensar. ¿Quien iba imaginar que esta historieta tuviera tanto que contar?', '4', '1');
INSERT INTO 18_comentario VALUES (NULL, 'A mis ninos les ha encantado el cuento de "Pupi y sus amigos". ¡Muchas gracias a todos los que me lo han recomendado!', '5', '2');
INSERT INTO 18_comentario VALUES (NULL, '¡No me esperaba ese giro en la trama justo al terminar el libro! Que momentos tan angustiosos he tenido...', '2', '3');
INSERT INTO 18_comentario VALUES (NULL, 'Aunque este poema apenas llegue a cuatro versos, su intencion esta muy clara. ¡Que arte!', '6', '4');

/* TABLA autor_HAS_libro */
INSERT INTO 18_autor_has_libro VALUES ('1','1');
INSERT INTO 18_autor_has_libro VALUES ('2','2');
INSERT INTO 18_autor_has_libro VALUES ('3','3');
INSERT INTO 18_autor_has_libro VALUES ('4','4');
INSERT INTO 18_autor_has_libro VALUES ('5','5');
INSERT INTO 18_autor_has_libro VALUES ('6','6');

/* TABLA libro_HAS_genero*/
INSERT INTO 18_libro_has_genero VALUES ('1', '3');
INSERT INTO 18_libro_has_genero VALUES ('2', '2');
INSERT INTO 18_libro_has_genero VALUES ('3', '7');
INSERT INTO 18_libro_has_genero VALUES ('4', '11');
INSERT INTO 18_libro_has_genero VALUES ('1', '10');

/* TABLA usuario_HAS_libros*/
INSERT INTO 18_usuario_has_libro VALUES ('1', '1');
INSERT INTO 18_usuario_has_libro VALUES ('1', '4');
INSERT INTO 18_usuario_has_libro VALUES ('1', '2');
INSERT INTO 18_usuario_has_libro VALUES ('1', '3');
INSERT INTO 18_usuario_has_libro VALUES ('1', '5');
INSERT INTO 18_usuario_has_libro VALUES ('1', '6');
INSERT INTO 18_usuario_has_libro VALUES ('2', '3');
INSERT INTO 18_usuario_has_libro VALUES ('3', '3');
INSERT INTO 18_usuario_has_libro VALUES ('2', '4');
