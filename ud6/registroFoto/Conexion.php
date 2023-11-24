<?php
    class Conexion {
        private static $host = 'localhost';
        private static $usuario = 'fotos';
        private static $clave = 'fotos';
        private static $baseDatos = 'ejerfotosusuarios';
        private static $conexion;

        private function __construct() {
        }

        public static function obtenerConexion() {
            if (!isset(self::$conexion)) {
                try {
                    $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$baseDatos;
                    self::$conexion = new PDO($dsn, self::$usuario, self::$clave);

                    // Configuración adicional (opcional)
                    self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                } catch (PDOException $e) {
                    die("Error de conexión: " . $e->getMessage());
                }
            }

            return self::$conexion;
        }

        // Método estático para cerrar la conexión a la base de datos
        public static function cerrarConexion() {
            self::$conexion = null;
            echo "Conexión cerrada";
        }
    }

    // Uso de la clase
    $conexion = Conexion::obtenerConexion();

    // Aquí puedes realizar operaciones en la base de datos

    Conexion::cerrarConexion();
?>
