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

        public function muestraJugadoresPosibles(){
            if (($this->minJugadores == 1) && ($this->maxJugadores == 1)) {
                return "Para un Jugador";
            }else if ($this->minJugadores == $this->maxJugadores) {
                return "para {$this->minJugadores} jugadores.";
            }else{
                return "de {$this->minJugadores} a {$this->maxJugadores}";
            }
        }

        public function muestraResumen(){
            return "titulo: {$this->titulo}, numero: {$this->numero}, consola {$this->consola}, {$this->muestraJugadoresPosibles()}, precio Sin Iva: {$this->getPrecio()}";
        }
    }
?>