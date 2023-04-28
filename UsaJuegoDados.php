<?php
include 'JuegoDados.php';


//leer nombres de jugadores desde el teclado
$jugador1= $_POST['NomJ1'];
$jugador2= $_POST['NomJ2'];
if($jugador1 === '' || $jugador2==''){
    echo json_encode('ERROR');
}else{
    $miJuego = new JuegoDados($jugador1, $jugador2);

$miJuego->iniciarJuego();

/*
while (juego.vencedor != null){

    juego.iniciarJuego();
}
*/

if ($miJuego->vencedor == null){
    echo json_encode("Empate. No hay un vencedor ");
}
else{
    echo json_encode("El puntaje de cada uno es: 
    <br> {$miJuego->jugador1->nombre} <br> {$miJuego->marcadorJugador1}<br>
    <br> {$miJuego->jugador2->nombre} <br> {$miJuego->marcadorJugador2}<br>
    El vencedor es {$miJuego->vencedor->nombre}");
}
}


?>
