DROP DATABASE pfc_libros;
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

CREATE TABLE IF NOT EXISTS usuario (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nick VARCHAR(20),
    contraseña VARCHAR(45),
    email VARCHAR(45),
    UNIQUE (email),
    UNIQUE (nick),
    PRIMARY KEY (id)
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

/* INSERCION TABLA libro */
INSERT INTO libro VALUES (NULL, '9788491048961', 'Jane Eyre','Alianza', 'SINOPSIS');
INSERT INTO libro VALUES (NULL, '9788498386264', 'Percy Jackson y el ladrón del rayo', 'Salamandra', 'SINOPSIS');
INSERT INTO libro VALUES (NULL, '9788401337550', 'Dime quién soy', 'Plaza & Janes', 'SINOPSIS');
INSERT INTO libro VALUES (NULL, '9788417910143', 'Persépolis', 'Reservoir Books', 'SINOPSIS');
INSERT INTO libro VALUES (NULL, '9788467582871', 'Pupi y Pompita', 'SM', 'SINOPSIS');
INSERT INTO libro VALUES (NULL, '9788412182279', 'Rimas(1871)', 'Anaya', 'SINOPSIS');

/* INSERCION TABLA autor */
INSERT INTO autor VALUES (NULL, 'Jane Eyre', DEFAULT);
INSERT INTO autor VALUES (NULL, 'Rick Riordan', DEFAULT);
INSERT INTO autor VALUES (NULL, 'Julia Navarro', DEFAULT);
INSERT INTO autor VALUES (NULL, 'Marjane Satrapi', DEFAULT);
INSERT INTO autor VALUES (NULL, 'Maria Andrada Guerrero', DEFAULT);

/* INSERCION TABLA genero */
INSERT INTO genero VALUES (NULL, 'Extranjera', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Española e hispanoamericana', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Juvenil', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Romantica', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Ciencia Ficción', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Fantasia', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Policiaca', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Histórica', 'Narrativa');
INSERT INTO genero VALUES (NULL, 'Historia', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Ciencia', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Psicología', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Política', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Autoayuda', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Arte', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Espiritualidad y Religión', 'Ensayo');
INSERT INTO genero VALUES (NULL, 'Novela Gráfica', 'Cómic');
INSERT INTO genero VALUES (NULL, 'Cómic', 'Cómic');
INSERT INTO genero VALUES (NULL, 'Manga', 'Cómic');
INSERT INTO genero VALUES (NULL, 'De 0 a 6 años', 'Infantil');
INSERT INTO genero VALUES (NULL, 'De 6 a 8 años', 'Infantil');
INSERT INTO genero VALUES (NULL, 'De 8 a 12 años', 'Infantil');

/* TABLA DE genero*/
INSERT INTO contenido_multimedia VALUES (NULL, 'Jane Eyre (2011)', 'Película', '1');
INSERT INTO contenido_multimedia VALUES (NULL, 'Percy Jackson y el ladrón del rayo (2010)', 'Película', '2');
INSERT INTO contenido_multimedia VALUES (NULL, 'Dime quién soy (2020)', 'Miniserie', '3');
INSERT INTO contenido_multimedia VALUES (NULL, 'Persépolis (2007)', 'Película', '4');
INSERT INTO contenido_multimedia VALUES (NULL, 'Conecta con Pupi', 'Youtube', '5');

/* TABLA FORO */
INSERT INTO foro VALUES (NULL, '1');
INSERT INTO foro VALUES (NULL, '2');
INSERT INTO foro VALUES (NULL, '3');
INSERT INTO foro VALUES (NULL, '4');
INSERT INTO foro VALUES (NULL, '5');
INSERT INTO foro VALUES (NULL, '6');

/* TABLA USUARIO*/
INSERT INTO usuario VALUES (NULL, 'PEPITA22', '1111', 'pepita22@gmail.com');
INSERT INTO usuario VALUES (NULL, 'LECTOR123', '2222', 'lector2222@gmail.com');
INSERT INTO usuario VALUES (NULL, 'CAPIPERCY', '3333', 'capipercy@gmail.com');
INSERT INTO usuario VALUES (NULL, 'TeatroYmás', '4444', 'teatroymas@gmail.com');

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

/* TABLA libro_HAS_genero*/
INSERT INTO libro_has_genero VALUES ('1', '1');
INSERT INTO libro_has_genero VALUES ('2', '3');
INSERT INTO libro_has_genero VALUES ('3', '8');
INSERT INTO libro_has_genero VALUES ('4', '16');
INSERT INTO libro_has_genero VALUES ('1', '20');
