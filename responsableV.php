<?php
class responsableV{

    private $nroEmpleado;
    private $nroLicencia;
    private $nombreEmpleado;
    private $apellidoEmpleado;

public function __construct($nroEmpleado,$nroLicencia,$nombreEmpleado,$apellidoEmpleado)
{$this->nroLicencia=$nroLicencia;
    $this->nroEmpleado=$nroEmpleado;
    $this->nombreEmpleado=$nombreEmpleado;
    $this->apellidoEmpleado=$apellidoEmpleado;
    
}

public function getNroEmpleado()
{return $this->nroEmpleado;}
public function setNroEmpleado($nuevo)
{$this->nroEmpleado=$nuevo;}

public function getNroLicencia()
{return $this->nroLicencia;}
public function setNroLicencia($nuevo)
{$this->nroLicencia=$nuevo;}

public function getNombreEmpleado()
{return $this->nombreEmpleado;}
public function setNombreEmpleado($nuevo)
{$this->nombreEmpleado=$nuevo;}

public function getApellidoEmpleado()
{return $this->apellidoEmpleado;}
public function setApellidoEmpleado($nuevo)
{$this->apellidoEmpleado=$nuevo;}

public function __toString()
{
    return "\nNro Empleado: ".$this->getNroEmpleado().
            "\nNro Licencia: ".$this->getNroLicencia().
            "\nNombre y Apellido: ".$this->getNombreEmpleado()." ".$this->getApellidoEmpleado();
}

}
