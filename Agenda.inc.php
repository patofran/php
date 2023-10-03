<?php
    require_once("contacto.inc.php");
    
    class Agenda{
        private $agenda = array();

        public function insertarContacto($contacto){
            array_push($this->agenda, $contacto);
        }

        public function borrarContacto(){
            $contacto = array_shift($this->agenda);
        }

        public function __toString(){
            $cadena = "";
            foreach ($this->agenda as $cont) {
                $cadena .= $cont . "<br><br>";
            }
            return $cadena;
        }

    }
?>