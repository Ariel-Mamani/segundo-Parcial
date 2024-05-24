<?php
class PartidoFutbol extends Partido{
    private $coefMenores;
    private $coefJuvenil;
    private $coefMayores;
    
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent:: __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuvenil = 0.19;
        $this->coefMayores = 0.27;
    }
    public function getCoefMenores(){
        return $this->coefMenores;
    }
    public function setCoefMenores($coeficiente){
        $this->coefMenores=$coeficiente;
    }
    public function getCoefJuvenil(){
        return $this->coefJuvenil;
    }
    public function setCoefJuvenil($coeficiente){
        $this->coefJuvenil=$coeficiente;
    }
    public function getCoefMayores(){
        return $this->coefMayores;
    }
    public function setCoefMayores($coeficiente){
        $this->coefMayores=$coeficiente;
    }
    public function __toString()
    {
        $cadena= parent:: __toString();
        $cadena.=$this->getCoefMenores()."\n";
        $cadena.=$this->getCoefMenores()."\n";
        $cadena.=$this->getCoefMayores()."\n";
       return $cadena;
    }
    public function darEquipoGanador(){
        $equipoGanador = parent:: darEquipoGanador();
        return $equipoGanador;
    }
    /*Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes
     que serán aplicados según la categoría del partido (coef_Menores,coef_juveniles,
     coef_Mayores) */
    public function coeficientePartido(){
        $coef = parent:: coeficientePartido();
        $categoria= parent:: getObjEquipo1()->getCategoria();
        if($categoria == $this->getCoefMenores()){
            $coefNuevo = $coef * $this->getCoefMenores();
        }elseif($categoria == $this->getCoefJuvenil()){
            $coefNuevo = $coef * $this->getCoefJuvenil();
        }else{
            $coefNuevo = $coef * $this->getCoefMayores();
        }
        return $coefNuevo;
    }
}