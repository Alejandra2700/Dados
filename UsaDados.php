<?php
//Ciclo de vida de objetos
include 'Dado.php';

//crear
$miDado = new Dado();

//Usarlo
$miDado->lanzar();
echo 'Puntos obtenidos : ' . $miDado->puntos;

//Destruir o finalizar
$miDado = null;
?>


