<?php
    class Soporte{
        
        public $titulo;
        protected $numero;
        private $precio;
        private const iva = 0.21;

        public function getTitulo(){
            return $this->titulo;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function getPrecioConIVA(){
            return $this->precio * (1 + self::IVA);
        }
    } 
?>