<?php
    include_once "Soporte.php";

    class Juego extends Soporte{
        public $consola;
        private $minJugadores;
        private $maxJugadores;

        public function __construct($titulo, $numero, $precio, $consola, $minJugadores, $maxJugadores) {
            parent::__construct($titulo, $numero, $precio);  
            $this->consola = $consola;
            $this->minJugadores = $minJugadores;
            $this->maxJugadores = $maxJugadores;
        }

        public function muestraResumen(){
            return "titulo: {$this->titulo}, numero: {$this->numero}, consola {$this->consola}, precio Sin Iva: {$this->getPrecio()}";
        }
    }
?>