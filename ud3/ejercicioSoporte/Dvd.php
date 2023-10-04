<?php

    class Dvd extends Soporte{
        private $idiomas;
        private $formatPantalla;

        public function __construct($titulo, $numero, $precio, $idiomas, $formatPantalla) {
            parent::__construct($titulo, $numero, $precio);  
            $this->idiomas = $idiomas;
            $this->formatPantalla = $formatPantalla;
        }

        public function muestraResumen(){
            return "titulo: {$this->titulo}, numero: {$this->numero}, idioma {$this->idioma}, formato de la pantalla: {$this->formatPantalla}, precio Sin Iva: {$this->getPrecio()}";
        }
    }
?>