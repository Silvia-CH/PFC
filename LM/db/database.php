<?php

class Database
{
    public function conectar()
    {
        $driver = "mysql";
        $host = "localhost";
        $port = "3306";
        $bd = "pfc_libros";
        $user = "root";
        $password = "";

        $dsn = "$driver:dbname=$bd;host=$host;port=$port";

        try {
            $gbd = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

        return $gbd;
    }

    public function getAll($tabla)
    {
        $sql = "SELECT * FROM $tabla;";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetchAll();
    }

    public function getGenero($id)
    {
        $sql = "SELECT * FROM libro_has_genero WHERE genero_id = $id;";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetch(PDO::FETCH_ASSOC);
    }

    public function getLibro($idGenero, $idLibro)
    {
        $sql = "SELECT * FROM libro_has_genero WHERE genero_id = $idGenero AND libro_id = $idLibro;";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetch(PDO::FETCH_ASSOC);
    }
    public function getLibroUser($idUser)
    {
        $sql = "SELECT * FROM usuario_has_libro WHERE usuario_id = $idUser;";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetchAll();
    }
    public function delete($id, $table, $nombreID)
    {
        $sql = "DELETE FROM $table WHERE $nombreID = $id;";
        self::conectar()->exec($sql);
    }

    public function deleteRelationTable($idUno, $idDos, $table, $nombreUno, $nombreDos)
    {
        $sql = "DELETE FROM $table WHERE $nombreUno = $idUno AND $nombreDos = $idDos;";
        self::conectar()->exec($sql);
    }
    
    public function getColumns($table)
    {
        $sql = "SELECT COLUMN_NAME AS 'columnas'
            FROM INFORMATION_SCHEMA.columns
            WHERE TABLE_SCHEMA = database()
            AND TABLE_NAME = '" . $table . "';";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetchAll();
    }

    public function create($table, $nameColumn, $numColumn, $valores)
    {
        $sql = "INSERT INTO $table (";
        $contador = 1;
        foreach ($nameColumn as $name) {
            if ($contador < $numColumn) {
                $sql .= "$name[0]" . ", ";
            } else {
                $sql .= "$name[0])";
            }
            $contador++;
        }
        $sql .= " VALUES(";
        $contador = 1;
        foreach ($nameColumn as $name) {
            if ($contador < $numColumn) {
                $sql .= "'" . $valores[$name[0]] . "', ";
            } else {
                $sql .= "'" . $valores[$name[0]] . "'";
            }
            $contador++;
        }
        $sql .= ");";
        echo $sql;
        self::conectar()->exec($sql);
    }

    public function update($id, $table, $nameColumn, $numColumn, $valores)
    {
        $sql = "UPDATE $table SET ";
        $cont = 1;
        $contador = 1;
        foreach ($nameColumn as $name) {
            if ($contador < $numColumn) {
                $sql .= "$name[0]='" . $valores[$name[0]] . "', ";
            } else {
                $sql .= "$name[0]='" . $valores[$name[0]] . "'";
            }
            $contador++;
        }
        $sql .= " WHERE id=$id;";
        self::conectar()->exec($sql);
    }

    public function getById($id, $tabla, $nombreID)
    {
        $sql = "SELECT * FROM $tabla WHERE $nombreID=$id;";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetch(PDO::FETCH_ASSOC);
    }

    public function getByIdRelation($id, $tabla, $nombreID)
    {
        $sql = "SELECT * FROM $tabla WHERE $nombreID=$id;";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetchAll();
    }
    public function getByIdRelations($idUno, $idDos, $tabla, $nombreUno, $nombreDos)
    {
        $sql = "SELECT * FROM $tabla WHERE $nombreUno = $idUno AND $nombreDos = $idDos;";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetch(PDO::FETCH_ASSOC);
    }

    // user
    public function login($email, $pass)
    {
        $sql = "SELECT * FROM usuario WHERE email='$email' AND contraseña='$pass';";
        $user = self::conectar()->query($sql);
        if ($user != null) {
            return $user->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function existeUser($nick, $email)
    {
        $sql = "SELECT * FROM 18_usuario WHERE nick= '$nick' OR email = '$email';";
        $resultados = self::conectar()->query($sql);
        return $resultados->fetch(PDO::FETCH_ASSOC);
    }

    public function insertarUser($nick, $pass, $email )
    {
        $sql = "INSERT INTO usuario (nick, contraseña, email, rol_id) VALUES ('$nick', '$pass', '$email', 2);";
        self::conectar()->exec($sql);
    }
}
