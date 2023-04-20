<?php

    class Database {

        /**
         * Funcion que realiza la configuracion de la conexion a la base de datos
         */
        public function conectar(){
            
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

        public function getAll($tabla){
            $sql = "SELECT * FROM $tabla";
            $resultados = self::conectar()->query($sql);
            return $resultados;        
        }

    }
?>
