<?php
class PartidoBasquet extends Partido{
private $cantInfracciones;
    private $coefPenalizacion;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantInfracciones)
    {
        parent:: __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
        $this->coefPenalizacion = 0.75;
    }
    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }
    public function setCantInfracciones($infracciones){
        $this->cantInfracciones=$infracciones;
    }
    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }
    public function setCoefPenalizacion($penalizacion){
        $this->coefPenalizacion=$penalizacion;
    }
    public function __toString()
    {
        $cadena= parent:: __toString();
        $cadena.= $this->getCantInfracciones();
        $cadena.=$this->getCoefPenalizacion();
        return $cadena;
    }
    public function darEquipoGanador(){
        $equipoGanador = parent:: darEquipoGanador();
        return $equipoGanador;
    }
    /*Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad de 
    infracciones de manera tal que al coeficiente base se debe restar un coeficiente de 
    penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones.
    Es decir: 
        coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones) */
    public function coeficientePartido(){
        $cantInfracciones = $this->getCantInfracciones();
        $coefPenalizacion = $this->getCoefPenalizacion();
        $coef = parent:: coeficientePartido();
        $coefNuevo =  $coef - ($coefPenalizacion*$cantInfracciones);
        return $coefNuevo;
    }
}