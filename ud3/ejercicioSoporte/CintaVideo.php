<?php
    include_once "Soporte.php";

    class CintaVideo extends Soporte{
        private $duracion;

        public function __construct($titulo, $numero, $precio, $duracion) {
            parent::__construct($titulo, $numero, $precio);  
            $this->duracion = $duracion;
        }

        public function muestraResumen(){
            return "titulo: {$this->titulo}, numero: {$this->numero}, duracion: {$this->duracion}, precio Sin Iva: {$this->getPrecio()}";
        }
    }
?>