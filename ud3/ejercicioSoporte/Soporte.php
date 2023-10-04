<?php
    class Soporte{
        
        public $titulo;
        protected $numero;
        private $precio;
        private const iva = 0.21;

        public function __construct($titulo, $numero, $precio) {
            $this->titulo = $titulo;
            $this->numero = $numero;
            $this->precio = $precio;
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function getNumero() {
            return $this->numero; 
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function getPrecioConIVA(){
            return $this->precio * (1 + self::iva);
        }

        public function muestraResumen(){
            return "titulo: {$this->titulo} /numero: {$this->numero} /precio Sin Iva: {$this->precio}";
        }
    } 
?>