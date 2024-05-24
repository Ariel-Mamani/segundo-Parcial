<?php
class Torneo{
    private $colPartidos;
    private $importePremio;

    public function __construct($partidos, $importe)
    {
        $this->colPartidos = $partidos;
        $this->importePremio = $importe;
    }

    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function setColPartidos($partidos){
        $this->colPartidos = $partidos;
    }
    public function getPremio(){
        return $this->importePremio;
    }
    public function setPremio($importe){
        $this->importePremio = $importe;
    }
    public function __toString()
    {
        return "Coleccion partidos: ".$this->retornaCadena($this->getColPartidos())."\n".
               "Importe premio: ".$this->getPremio();
    }
    public function retornaCadena($coleccion){
        $cadena=" ";
        foreach($coleccion as $elemento){
            $cadena=$cadena." ".$elemento."\n";
           
        }
        return $cadena;
    }
    /*mplementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido)
    en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se 
    realizará el partido y si se trata de un partido de futbol o basquetbol . El método 
    debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla
    en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la
    misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado
    ese partido en el torneo */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $partido = -1;
        $colPartidos = $this->getColPartidos();
        if($OBJEquipo1->getObjCategoria() == $OBJEquipo2->getObjCategoria() && $OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores()){
            $idpartido = $this->getColPartidos() + 1;
            if($tipoPartido instanceof PartidoFutbol){
                //$idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2
                $partido = new PartidoFutbol($idpartido,$fecha,$OBJEquipo1,0,$OBJEquipo2,0,);
            }elseif($tipoPartido instanceof PartidoBasquet){
                $partido = new PartidoBasquet($idpartido,$fecha,$OBJEquipo1,0,$OBJEquipo2,0,0);
            }
        }
        if($partido!=-1){
            array_push($colPartidos,$partido);
            $this->setColPartidos($colPartidos);
        }
        return $partido;
    }
    /*Implementar el método darGanadores($deporte) en la clase Torneo que recibe por 
    parámetro si se trata de un partido de fútbol o de básquetbol y en  base  al parámetro
    busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles)
    . El método retorna una colección con los objetos de los equipos encontrados.*/
    public function darGanadores($deporte){
        $equiposGanadores =[];
        $colPartidos=$this->getColPartidos();
        foreach( $colPartidos as $partido){
            if($deporte instanceof PartidoFutbol && $partido instanceof PartidoFutbol){
                $equipo = $partido->darEquipoGanador();
                array_push( $equiposGanadores,$equipo);
            }elseif($deporte instanceof PartidoBasquet && $partido instanceof PartidoBasquet){
                $equipo = $partido->darEquipoGanador();
                array_push( $equiposGanadores,$equipo);
            }
        }
        return $$equiposGanadores;
    }
}