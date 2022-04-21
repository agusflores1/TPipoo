<?php 
  class Pasajero{

private $nombre;
private $apellido;
private $DNI;
private $telefono;

public function __construct($nombre,$apellido,$DNI,$telefono)
{
 $this->nombre=$nombre;
 $this->apellido=$apellido;
 $this->nroDNI=$DNI;
 $this->telefono=$telefono;
}

public function getNombre()
{return $this->nombre;}
public function setNombre($nombreNuevo)
{ $this->nombre=$nombreNuevo;}

public function getApellido()
{return $this->apellido;}
public function setApellido($apellidoNuevo)
{$this->apellido=$apellidoNuevo;}

public function getDNI()
{return $this->nroDNI;}
public function setDNI($nroNuevo)
{ $this->nroDNI=$nroNuevo;}

public function getTelefono()
{return $this->telefono;}
public function setTelefono($nroNuevo)
{ $this->telefono=$nroNuevo;}


public function __toString()
{
    return "Nombre y Apellido: ".$this->getNombre() . $this->getApellido()
           ."DNI: ". $this->getDNI()
           ."Telefono: ".$this->getTelefono();
}

}
