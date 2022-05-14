<?php

class ViajeTerrestre extends Viaje
{
    
    private $comodidadAsientos;
    
public function __construct($codigoViaje,$destino,$cantMax,$importe,$tipoViaje,$responsableV,$arrayPasajeros,$CamaOsemicama)
{
    parent::__construct($codigoViaje,$destino,$cantMax,$responsableV,$arrayPasajeros,$importe,$tipoViaje,);
   $this->comodidadAsientos=$CamaOsemicama; 
   $this->importe=$importe;
   $this->tipoViaje=$tipoViaje;
}

public function getComodidad()
{return $this->comodidadAsientos;}
public function setComodidad($nuevo)
{ $this->comodidadAsientos=$nuevo;}


public function __toString()
{
    $cadena=parent::__toString();
    $cadena.="Comodidad: ".$this->getComodidad()."\n";
    return $cadena;
}

public function venderPasaje($pasajero)
{  parent::venderPasaje($pasajero);
  if($this->getComodidad())
  { $importe = $this->getPrecioPasaje();
    $tipoAsiento = $this->getComodidad();
    $idaOVuelta = $this->getTipoViaje();
    if($tipoAsiento == 'Cama'){
        $importe *= 1.25;
    }
    if($idaOVuelta == 'Ida y Vuelta'){
        $importe *= 1.5;}
 
    
return $importe;}
}

}

 ?>
