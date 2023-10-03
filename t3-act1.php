<?php
    require_once("Agenda.inc.php");
    require_once("contacto.inc.php");
    $contacto1 = new Contacto(1, "fran", "bolos", "mercado", 1234);
    $contacto2 = new Contacto(2, "nuria", "romero", "serrano", 4321);
    $contacto3 = new Contacto(3, "jose", "bolos", "matias", 5678);
    $agenda = new Agenda();
    $agenda->insertarContacto($contacto1);
    $agenda->insertarContacto($contacto2);
    $agenda->insertarContacto($contacto3);
    echo $agenda;
    echo "//Elimino el primer contacto.<br><br>";
    $agenda->borrarContacto();
    echo $agenda;
?>