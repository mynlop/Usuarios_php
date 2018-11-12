<?php
    abstract class LoginDB{
        private static $server  =    "localhost";
        private static $bd      =    "pruebas";
        private static $user    =    "root";
        private static $pass    =    "";

        public function connectDB(){
            try{
                $conexion = new PDO("mysql:hosts=" .self::$server ."; dbname=" .self::$bd ."; charset=utf8", self::$user, self::$pass);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch( PDOException $e){
                die("Error: " .$e->getMessage());
            }
            return $conexion;
        }

        public function cerrarConexion(){
            $conexion = null;
        }
    }

?>