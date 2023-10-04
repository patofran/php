<?php
    class Soporte{
        
        public $titulo;
        protected $numero;
        private $precio;
        private static $iva = 0.21;

        public function getCodigo(){
            return $this->codigo;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function getPrecioConIVA(){
            return self::iva;
        }
    } 
?>