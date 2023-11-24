<?php
    class Conexion {
        private $host = 'localhost';
        private $usuario = 'fotos';
        private $clave = 'fotos';
        private $baseDatos = 'ejerfotosusuarios';
        private $conexion;

        private function __construct() {
        }

        public static function obtenerConexion() {
            if (!isset($this->conexion)) {
                try {
                    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
                    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->baseDatos;
                    $this->conexion = new PDO($dsn, $this->usuario, $this->clave, $opc);

                } catch (PDOException $e) {
                    die("Error de conexión: " . $e->getMessage());
                }
            }

            return $this->conexion;
        }
    }
?>
