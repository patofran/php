<?php
    class Conexion {
        private static $host = 'localhost';
        private static $usuario = 'fotos';
        private static $clave = 'fotos';
        private static $baseDatos = 'ejerfotosusuarios';
        private static $conexion;

        public static function obtenerConexion() {
            try {
                $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$baseDatos;
                self::$conexion = new PDO($dsn, self::$usuario, self::$clave, $opc);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        
            return self::$conexion;
        } 
    }
?>