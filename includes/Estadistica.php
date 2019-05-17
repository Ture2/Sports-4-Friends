<?php
require_once __DIR__ . '/Aplicacion.php';

class Estadistica
{

    protected $id_estadistica;

    protected $usuario;

    protected $equipo;

    protected $partidosj;

    protected $partidosg;

    protected $partidose;

    protected $partidosp;

    public function __construct($id_estadistica, $usuario, $equipo, $partidosj, $partidosg, $partidose, $partidosp)
    {
        $this->id_estadistica = $id_estadistica;
        $this->usuario = $usuario;
        $this->equipo = $equipo;
        $this->partidosj = $partidosj;
        $this->partidosg = $partidosg;
        $this->partidose = $partidose;
        $this->partidosp = $partidosp;
    }

    public function getIdEstadistica()
    {
        return $this->id_estadistica;
    }

    public function getIdUsuario()
    {
        return $this->usuario;
    }

    public function getIdEquipo()
    {
        return $this->equipo;
    }

    public function getPartidoJugado()
    {
        return $this->partidosj;
    }

    public function getPartidoGanado()
    {
        return $this->partidosg;
    }

    public function getPartidoEmpatado()
    {
        return $this->partidose;
    }

    public function getPartidoPerdido(){
        return $this->partidosp;
    }

    public function setIdEstadistica($id_estadistica)
    {
        $this->id_estadistica = $id_estadistica;
    }

    public function setIdUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setIdEquipo($equipo)
    {
        $this->equipo = $equipo;
    }

    public function setPartidoJugado($partidosj)
    {
        $this->partidosj = $partidosj;
    }

    public function setPartidoGanado($partidosg)
    {
        $this->partidosg = $partidosg;
    }

    public function setPartidoEmpatado($partidose)
    {
        $this->partidose = $partidose;
    }

    public function setPartidoPerdido($partidosp){
        $this->partidosp = $partidosp;
    }
}



 ?>