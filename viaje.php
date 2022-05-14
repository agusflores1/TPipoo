<?php
 class viaje
  {
      private $codigoViaje;
      private $destino ;
      private $cantMax;
      private $cantidadPasajeros=0;
      private $arrayPasajeros;
      private $responsableV;
      private $importe;
      private $tipoViaje;

      public function __construct($codigoViaje,$destino,$cantMax,$responsableV,$arrayPasajeros,$importe,$tipoViaje)
      {  $this->codigoViaje=$codigoViaje ;
        $this->destino=$destino;
        $this->cantMax=$cantMax;
        $this->responsableV=$responsableV;
        $this->arrayPasajeros=$arrayPasajeros ;

        $this->importe=$importe;
        $this->tipoViaje=$tipoViaje; 
      }

      public function getCodigoViaje()
      {return $this->codigoViaje;}
      public function setCodigoViaje($var)
      {$this->codigoViaje=$var;}
   
      public function getDestino()
      {return $this->destino;}
      public function setDestino($var)
      {$this->destino=$var;}

      public function getCantMax()
      {return $this->cantMax;}
      public function setCantMax($var)
      {$this->cantMax=$var;}
 
      public function getResponsable()
      {return $this->responsableV;}
      public function setResponsable($nuevoResponsable)
      {$this->responsableV=$nuevoResponsable;}

      public function getPasajeros()
      {return $this->arrayPasajeros;}
      public function setPasajeros($arrayPasajero)
      {$this->arrayPasajeros=$arrayPasajero;}


 //TP3
public function getPrecioPasaje()
{return $this->importe;}

public function setPrecioPasaje($nuevo)
{ $this->importe=$nuevo;}

public function getTipoViaje()
{return $this->tipoViaje;}

public function setTipoViaje($nuevo)
{ $this->tipoViaje=$nuevo;}






 //Metodo para agregar pasajero sin array push y in array :)
     public function agregarPasajero($pasajeroNuevo)
     { $arrayPasajeros=$this->getPasajeros();
      $maxCantidad = $this->getCantMax();
      $rta = false;
 for ($i = 0; $i < count($arrayPasajeros); $i++)
    {
      $pasajero = $arrayPasajeros[$i];
      if ($pasajeroNuevo == $pasajero)
      { $rta = true; }
      }
      if ($rta == false)
      {
      $arrayPasajeros[count($arrayPasajeros)] = $pasajeroNuevo; 
      $this->setPasajeros($arrayPasajeros);
     }
   return $rta;}


     /**Metodo para saber si se puede agregar mas personas */
    public function disponibilidadLugar()
    { if(count($this->getPasajeros()) >= $this->getCantMax())
        { $retorno = false;}
        else {$retorno=true;}
        return $retorno;}

    //metodo para eliminar pasajero
    public function eliminarPasajero($pasajero){
        $retorno = false;
        $array = $this->getPasajeros();
        //si el pasajero se encuentra guardado en el arreglo, buscamos su clave y lo remplazamos
        if(in_array($pasajero, $array)){
            $key = array_search($pasajero, $array);
            array_splice($array, $key, 1);
            $this->setPasajeros($array);
            $retorno = true;
        }//si fue eliminado correctamente retornamos un valor booleano true
        return $retorno; }

    //funcion para modificar pasajero
    public function modificarPasajero($pasajero,$pasajeroNuevo)
    {       $arrayModificado = $this->getPasajeros();
            if(in_array($pasajero, $arrayModificado)){            
                $key = array_search($pasajero, $arrayModificado );
                $arrayModificado[$key] = $pasajeroNuevo;
                $this->setPasajeros($arrayModificado);            
                $retorno = true; }
            else{$retorno=false;}
            return $retorno;}

         //toString
    public function __toString(){

        $arrayPasajeros = $this->getPasajeros();
        $cantidad = count($arrayPasajeros);
        $stringPasasjeros=$this->pasajerosString();
        $str = "
        DATOS VIAJE: \n
        Viaje: {$this->getCodigoViaje()}.\n
        Destino: {$this->getDestino()}.\n
        Cantidad de Asientos: {$this->getCantMax()}.\n
        Asientos ocupados: $cantidad.\n".
        "\nDatos Responsable: ".$this->getResponsable(). "\n".
        "\nDatos de Pasajeros:".$stringPasasjeros." \n".
        "Precio: ".$this->getPrecioPasaje()."\n".
        "Tipo de Viaje: ".$this->getTipoViaje()."\n";
        return $str;

}   

 /**Metodo para hacer un string de ls pasajeros*/
 private function pasajerosString(){
    $strPasajeros = "";
foreach ($this->getPasajeros() as $key => $value) {
   $nombre = $value->getNombre();
   $apellido = $value->getApellido();
   $dni = $value->getDNI();
   $telefono = $value->getTelefono();

   $strPasajeros .= 
   "\n Nombre: "  .  $nombre .
   "\n Apellido: ". $apellido.
   "\n DNI: ". $dni.
   "\n Telefono: ".$telefono."\n";
  
}
return $strPasajeros;
  }


//TP N 3
  public function hayPasajesDisponibles()
  { { if(count($this->getPasajeros()) >= $this->getCantMax())
    { $retorno = false;}
    else {$retorno=true;}
    return $retorno;}}


public function venderPasaje($pasajero)
{$arrayPasajeros=$this->getPasajeros();
 if($this->hayPasajesDisponibles())
  {
    $this->agregarPasajero($pasajero); 
  }
}
          


}











  ?>
