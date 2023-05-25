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
    contraseña VARCHAR(45),
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
	FOREIGN KEY (foro_id) REFERENCES 18_foro(id),
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
INSERT INTO 18_libro VALUES (NULL, '9788491048961', 'Jane Eyre','Alianza', 'Dueña de un singular temperamento desde su complicada infancia de huérfana, primero a cargo de una tía poco cariñosa y después en la escuela Lowood, Jane Eyre logra el puesto de institutriz en Thornfield Hall para educar a la hija de su atrabiliario y peculiar dueño, el señor Rochester. Poco a poco, el amor irá tejiendo su red entre ellos, pero la casa y la vida de Rochester guardan un estremecedor y terrible misterio.');
INSERT INTO 18_libro VALUES (NULL, '9788498386264', 'Percy Jackson y el ladrón del rayo', 'Salamandra', '¿Qué pasaría si un día descubrieras que, en realidad, eres hijo de un dios griego que debe cumplir una misión secreta? Pues eso es lo que le sucede a Percy Jackson, que a partir de ese momento se dispone a vivir los acontecimientos más emocionantes de su vida. Expulsado de seis colegios, Percy padece dislexia y dificultades para concentrarse, o al menos ésa es la versión oficial. Objeto de burlas por inventarse historias fantásticas, ni siquiera él mismo acaba de creérselas hasta el día que los dioses del Olimpo le revelan la verdad: Percy es nada menos que un semidiós, es decir, el hijo de un dios y una mortal. Y como tal ha de descubrir quién ha robado el rayo de Zeus y así evitar que estalle una guerra entre los dioses.');
INSERT INTO 18_libro VALUES (NULL, '9788401337550', 'Dime quién soy', 'Plaza & Janes', 'Un periodista investiga la apasionante vida de una antepasada suya, una mujer que vivió intensamente el siglo XX desde los convulsos años de la república hasta la caída del muro de Berlín.');
INSERT INTO 18_libro VALUES (NULL, '9788417910143', 'Persépolis', 'Reservoir Books', 'Persépolis nos cuenta la revolución islámica iraní vista desde los ojos de una niña que asiste atónita al cambio profundo que experimentan su país y su familia, mientras ella debe aprender a llevar el velo. Intensamente personal y profundamente político, el relato autobiográfico de Marjane Satrapi examina qué significa crecer en un ambiente de guerra y represión política.');
INSERT INTO 18_libro VALUES (NULL, '9788491073352', 'Pupi y Pompita, superhéroes', 'SM', 'El mago Pinchón tiene un malvado plan: ¡hacer que la Tierra gire a velocidad supersónica! ¡Qué miedo! ¡Qué desastre! ¡Qué mareo!');
INSERT INTO 18_libro VALUES (NULL, '9788412182279', 'Rimas(1871)', 'Anaya', 'Las Rimas de Bécquer es la colección poética más importante del siglo XIX. Su éxito, en gran medida, se debe a la livianidad de sus textos, alejándose así del tono recargado que caracteriza a este género.');

/* INSERCION TABLA autor */
INSERT INTO 18_autor VALUES (NULL, 'Jane Eyre', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'Rick Riordan', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'Julia Navarro', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'Marjane Satrapi', DEFAULT);
INSERT INTO 18_autor VALUES (NULL, 'Maria Andrada Guerrero', DEFAULT);

/* INSERCION TABLA genero */
INSERT INTO 18_genero VALUES (NULL, 'Extranjera', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Española e hispanoamericana', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Juvenil', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Romantica', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Ciencia Ficción', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Fantasia', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Policiaca', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Histórica', 'Narrativa');
INSERT INTO 18_genero VALUES (NULL, 'Historia', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Ciencia', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Psicología', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Política', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Autoayuda', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Arte', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Espiritualidad y Religión', 'Ensayo');
INSERT INTO 18_genero VALUES (NULL, 'Novela Gráfica', 'Cómic');
INSERT INTO 18_genero VALUES (NULL, 'Cómic', 'Cómic');
INSERT INTO 18_genero VALUES (NULL, 'Manga', 'Cómic');
INSERT INTO 18_genero VALUES (NULL, 'De 0 a 6 años', 'Infantil');
INSERT INTO 18_genero VALUES (NULL, 'De 6 a 8 años', 'Infantil');
INSERT INTO 18_genero VALUES (NULL, 'De 8 a 12 años', 'Infantil');

/* TABLA DE contenido multimedia*/
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Jane Eyre_18 (2011)', 'Película', '1');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Percy Jac_18kson y el ladrón del rayo (2010)', 'Película', '2');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Dime quién soy (2020)', 'Miniserie', '3');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Persépolis (2007)', 'Película', '4');
INSERT INTO 18_contenido_multimedia VALUES (NULL, 'Conecta con Pupi', 'Youtube', '5'_18);

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
INSERT INTO 18_usuario VALUES _18(NULL, 'PEPITA22', 'Rr.2kjkh', 'pepita22@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'LECTOR123', 'Dc4=kjhkjh', 'lector2222@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'CAPIPERCY', 'Cc3,ijkij', 'capipercy@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'TeatroYmás', 'Bb2.uiop', 'teatroymas@gmail.com', '2');
INSERT INTO 18_usuario VALUES (NULL, 'ADMINISTRADOR', 'Aa1_qwer', 'adminbiblio@gmail.com', '1');

/* TABLA COMENTARIO */
INSERT INTO 18_comentario VALUES (NULL, 'La historia de la escritora basada en sus experiencias reales da mucho que pensar. ¿Quién iba imaginar que esta historieta tuviera tanto que contar?', '4', '1');
INSERT INTO 18_comentario VALUES (NULL, 'A mis niños les ha encantado el cuento de "Pupi y sus amigos". ¡Muchas gracias a todos los que me lo han recomendado!', '5', '2');
INSERT INTO 18_comentario VALUES (NULL, '¡No me esperaba ese giro en la trama justo al terminar el libro! Que momentos tan angustiosos he tenido...', '2', '3');
INSERT INTO 18_comentario VALUES (NULL, 'Aunque este poema apenas llegue a cuatro versos, su intención está muy clara. ¡Que arte!', '6', '4');

/* TABLA autor_HAS_libro */
INSERT INTO 18_autor_has_libro VALUES ('1','1');
INSERT INTO 18_autor_has_libro VALUES ('2','2');
INSERT INTO 18_autor_has_libro VALUES ('3','3');
INSERT INTO 18_autor_has_libro VALUES ('4','4');
INSERT INTO 18_autor_has_libro VALUES ('5','5');

/* TABLA libro_HAS_genero*/
INSERT INTO 18_libro_has_genero VALUES ('1', '1');
INSERT INTO 18_libro_has_genero VALUES ('2', '3');
INSERT INTO 18_libro_has_genero VALUES ('3', '8');
INSERT INTO 18_libro_has_genero VALUES ('4', '16');
INSERT INTO 18_libro_has_genero VALUES ('1', '20');

/* TABLA usuario_HAS_libros*/
INSERT INTO 18_usuario_has_libro VALUES ('1', '1');
INSERT INTO 18_usuario_has_libro VALUES ('2', '3');
