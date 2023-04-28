<?php

class Dado
{
    public int $puntos;

    public function lanzar(): void{
        //Simular el lanzamiento
        $this->puntos = rand(1, 6);
    }

    public function __construct()
    {
        $this->puntos = 0;
    }
}
?>


















