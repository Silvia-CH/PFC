<?php

    class Database {
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
        
        public function delete($id, $table){
            $sql = "DELETE FROM $table WHERE id = $id";
            self::conectar()->exec($sql);
        }

    }
?>
