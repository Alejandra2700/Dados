<?php

class Jugador{

    public String $nombre;
    public int $puntoGanado;
    /**
     * @param $dado1 Primer dado a lanzar
     * @param $dado2 Segundo dado a lanzar
     * @return (int ) Devuelve la suma de los puntos obtenidos en ambos dados
     */

    public function lanzaDado(Dado $dado1, Dado $dado2){
        $dado1->lanzar();
        $dado2->lanzar();

        //retornar los puntos que cayeron en los dados
        return (int) ($dado1->puntos + $dado2->puntos);
    }


}