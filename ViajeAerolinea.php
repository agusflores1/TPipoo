
 <?php

class ViajeAerolinea extends viaje
{
    private $nroVuelo;
    private $categoria;
    private $nombreAerolinea;
    private $escalas;

public function __construct($codigoViaje,$destino,$cantMax,$responsableV,$arrayPasajeros,$importe,$tipoViaje,$nroVuelo,$categoria,$nombreAerolinea,$escalas)
{
    parent::__construct($codigoViaje,$destino,$cantMax,$responsableV,$arrayPasajeros,$importe,$tipoViaje);
  
   $this->nroVuelo=$nroVuelo;
   $this->categoria=$categoria;
   $this->nombreAerolinea=$nombreAerolinea;
   $this->escalas=$escalas;    
}

public function getNroVuelo()
{return $this->nroVuelo;}
public function setNroVuelo($nuevo)
{ $this->nroVuelo=$nuevo;}

public function getCategoria()
{return $this->categoria;}
public function setCategoria($nuevo)
{ $this->categoria=$nuevo;}

public function getNombreAerolinea()
{return $this->nombreAerolinea;}
public function setNombreAerolinea($nuevo)
{ $this->nombreAerolinea=$nuevo;}

public function getEscalas()
{return $this->escalas;}
public function setEscalas($nuevo)
{ $this->escalas=$nuevo;}


public function __toString()
{
    $cadena=parent::__toString();
    $cadena.=
            "Numero Vuelo: ".$this->getNroVuelo().
            "\nCategoria: ".$this->getCategoria().
            "\nNombre Aerolinea: ".$this->getNombreAerolinea().
            "\nEscalas: ".$this->getEscalas()."\n";
    return $cadena;
}

public function venderPasaje($pasajero)
{   parent::venderPasaje($pasajero);
    $importe = $this->getPrecioPasaje();
    $idaOVuelta = $this->getTipoViaje();
    $cantidadDeEscalas = $this->getEscalas();
    $tipoAsiento = $this->getCategoria();

    if($tipoAsiento == 'Primera Clase' && $cantidadDeEscalas == 0){
        $importe *= 1.4;
    }elseif($tipoAsiento == 'Primera Clase' && $cantidadDeEscalas > 0){
        $importe *= 1.6;
    }
    if($idaOVuelta == 'Ida y Vuelta'){
        $importe *= 1.5;
    }
    return $importe;
    

}




}


 ?>
