<?php
 class viaje
  {
      private $codigoViaje;
      private $destino ;
      private $cantMax;
      private $cantidadPasajeros=0;
      private $arrayPasajeros=[];

      public function __construct($codigoViaje,$destino,$cantMax)
      {  $this->codigoViaje=$codigoViaje ;
        $this->destino=$destino;
        $this->cantMax=$cantMax ; }

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
 
      public function getPasajeros()
      {return $this->arrayPasajeros;}
      public function setPasajeros($arrayPasajero)
      {$this->arrayPasajeros=$arrayPasajero;}

 
       //Metodo para agregar pasajero
     public function agregarPasajero($pasajero)
        { $arrayNuevo=$this->getPasajeros();
        if(in_array($pasajero, $this->getPasajeros()))
        {$rta = true;}
        else
        {array_push($arrayNuevo, $pasajero);
         $this->setPasajeros($arrayNuevo);
        $rta=false;}
      return $rta;}

     /**Metodo para saber si se puede agregar mas personas */
    public function disponibilidadLugar()
    { if(count($this->getPasajeros()) >= $this->getCantMax())
        { $retorno = false;}
        else {$retorno=true;}
        return $retorno;}
        
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
       //Metodo para modificar los datos de un pasajero
    public function modificarPasajero($pasajero,$pasajeroNuevo)
    { $arrayModificado = $this->getPasajeros();
      if(in_array($pasajero, $arrayModificado))
      {         $key = array_search($pasajero, $arrayModificado );
                $arrayModificado[$key] = $pasajeroNuevo;
                $this->setPasajeros($arrayModificado);            
                $retorno = true; }
      else{$retorno=false;}
            return $retorno;}

    /**Metodo para hacer un string de ls pasajeros*/
    private function pasajerosString(){
             $strPasajeros = "";
        foreach ($this->getPasajeros() as $key => $value) {
            $nombre = $value['nombre'];
            $apellido = $value['apellido'];
            $dni = $value['DNI'];
            $strPasajeros .= "
            Nombre: $nombre.\n
            Apellido: $apellido.\n
            DNI: $dni.\n";
        }
        return $strPasajeros;
    }
         //toString
    public function __toString(){
        $pasajeros = $this->pasajerosString();
        $arrayPasajeros = $this->getPasajeros();
        $cantidad = count($arrayPasajeros);
        $str = "
        Viaje: {$this->getCodigoViaje()}.\n
        Destino: {$this->getDestino()}.\n
        Cantidad de Asientos: {$this->getCantMax()}.\n
        Asientos ocupados: $cantidad.\n
        Datos de Pasajeros: \n $pasajeros";
        return $str;

}   
  }
