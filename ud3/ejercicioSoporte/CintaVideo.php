<?php
    class CintaVideo extends Soporte{
        private $duracion;

        public function __construct($titulo, $numero, $precio, $duracion) {
            parent::__construct($titulo, $numero, $precio);  
            $this->duracion = $duracion;
        }

        public function getDduracion(){
            return $this->duracion;
        }

        public function muestraResumen(){
            return "titulo: " . $this->titulo . " /numero: " . $this->numero . " /duracion: " . $this->duracion . " /precio Sin Iva: " . $this->precio;
        }
    }
?>