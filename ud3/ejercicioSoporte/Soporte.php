<?php
    class Soporte{
        
        public $titulo;
        protected $numero;
        private $precio;
        private static const $iva = 0.21;

        public function getCodigo(){
            return $this->codigo;
        }
    } 
?>