<?php
include 'Jugador.php';
include 'Dado.php';
include 'Jugada.php';
class JuegoDados{
    public int $cantidadJugadas;
    public Jugador $jugador1;
    public Jugador $jugador2;
    public int $marcadorJugador1;
    public int $marcadorJugador2;
    public Dado $dado1;
    public Dado $dado2;
    public Jugador $vencedor;
    private bool $bandJugador; //true = Jugador1, false = Jugador2

    public function __construct($nombreJugador1,$nombreJugador2){
        $this->jugador1 =  new Jugador();
        $this->jugador1->nombre = $nombreJugador1;
        $this->jugador2 = new Jugador();
        $this->jugador2->nombre = $nombreJugador2;
    }

    public function elegirPrimerLanzador():void{
        if((int) (rand()*(3-1)==1)){
            $this->bandJugador = true;
        }
        else{
            $this->bandJugador = false;
        }
    }

    public function iniciarJugada():void{
        $jugadaActual = new Jugada();
        if($this->bandJugador){
            $jugadaActual->iniciarJugada($this->jugador1, $this->jugador2, $this->dado1, $this->dado2);

        }
        else{
            $jugadaActual->iniciarJugada($this->jugador2, $this->jugador1,
            $this->dado1, $this->dado2);
        }

        $this->marcadorJugador1 = $this->marcadorJugador1 + $this->jugador1->puntoGanado;
        $this->marcadorJugador2 = $this->marcadorJugador2 + $this->jugador2->puntoGanado;
        }

    public function iniciarJuego():void{
        //Crear dados, inicializar variables
        $this->dado1 = new Dado();
        $this->dado2 = new Dado();

        $this->cantidadJugadas = 0;
        $this->marcadorJugador1 = 0;
        $this->marcadorJugador2 = 0;


        $this->elegirPrimerLanzador();

        //Ciclo infinito de juego
        do {
            $this->iniciarJugada();

            $this->cantidadJugadas++;
            /*
            echo json_encode("<br> Num. jugada: $this->cantidadJugadas
                <br> puntaje jugador 1 =  $this->marcadorJugador1
                <br> puntaje jugador 2 = $this->marcadorJugador2 <br><br>");
            */
                    

        } while( ($this->marcadorJugador1 != 5) && ($this->marcadorJugador2 != 5) );

        //Determina ganador
        $this->vencedor = $this->determinarVencedor();
    }

    public function determinarVencedor(){
        //caso empate
        if (($this->marcadorJugador1 == 5) && ($this->marcadorJugador2 == 5))
            return null;

        //ganó el jugador 1
        if ($this->marcadorJugador1 == 5) {
                return $this->jugador1;
            }
            else { //ganó el jugador 1
                if ($this->marcadorJugador2 == 5) {
                    return $this->jugador2;
                }
            }
        return null;
    }

}

    
?>