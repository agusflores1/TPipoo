<?php
include "viaje.php";
echo "\n BIENVENIDO A VIAJE FELIZ \n
Ingrese los datos del viaje:  \n";
echo "------------------------\n";
echo "Ingrese codigo de viaje: \n ";
$codigo=trim(fgets(STDIN));
echo "Ingrese destino: \n ";
$destino=trim(fgets(STDIN));
echo "Ingrese cantidad maxima de pasajeros: \n ";
$cantMax=trim(fgets(STDIN));
$objViaje=new viaje($codigo,$destino,$cantMax);

do{
echo "MENU. \n
1. Agregar Pasajero \n
2. Quitar Pasajero. \n
3. Modificar Pasajero. \n 
4. Modificar el código del viaje.\n
5. Modificar el destino del viaje.\n
6. Modificar la cantidad de asientos del viaje. \n
7. Ver viaje. \n
8. Salir. \n"; ;
$rta=trim(fgets(STDIN));
 switch($rta)
{ 
case 1 :
        if($objViaje->disponibilidadLugar()==true)
        {$pasajero = recogerDatos();
        if($objViaje->agregarPasajero($pasajero)==false){
        echo "-------------------------------------------\n".
             "Pasajero agregado con exito.\n".
             "-------------------------------------------\n";}
        else
        {    echo "-------------------------------------------\n".
             "**El pasajero ya se encuentra en el viaje.**\n".
             "-------------------------------------------\n";}
        }
        else
        {   echo "-------------------------------------------\n".
                 "No hay mas lugares en este viaje.\n".
                 "-------------------------------------------\n";}            
        break;
  
case 2 :
        echo "Ingrese los datos del pasajero que desea eliminar: \n";
        $pasajero = recogerDatos();
        //luego de recoger los datos, eliminamos y verificamos que sus datos hayan sido borrados
        if($objViaje->eliminarPasajero($pasajero))
        {echo "-------------------------------------------\n".
              "El pasajero ha sido borrado con exito.\n".
              "-------------------------------------------\n";}
        else
        {echo "-------------------------------------------\n".
              "No se ha encontrado al pasajero.\n".
              "-------------------------------------------\n";}
        break;

case 3 :
      echo "Ingrese los datos del pasajero que quiere modificar: \n";
      $pasajero=recogerDatos();
      echo "Ingrese los datos del pasajero nuevo: \n";
      $pasajero2=recogerDatos();
      if($objViaje->modificarPasajero($pasajero, $pasajero2)==true)
      { echo "-------------------------------------------\n".
             "Se han modificado los datos.\n".
             "-------------------------------------------\n";}
     else{echo "-------------------------------------------\n".
               "No se ha encontrado al pasajero.\n".
               "-------------------------------------------\n";}
     break;

case 4 :
        echo "El codigo de el viaje es: {$objViaje->getCodigoViaje()}. \n";
        echo "Ingrese el nuevo código: \n";
        $codigoNuevo = trim(fgets(STDIN));
        $objViaje->setCodigoViaje($codigoNuevo);
        echo "el nuevo codigo es ".$objViaje->getCodigoViaje()."\n";
        break;

case 5:
        echo "El viaje posee el destino: {$objViaje->getDestino()}. \n";
        echo "Ingrese el nuevo destino: \n";
        $destinoNuevo = trim(fgets(STDIN));
        $objViaje->setDestino($destinoNuevo);
        echo "el nuevo destino es: ".$objViaje->getDestino()."\n";
        break;
case 6 :
        echo "Cantidad maxima de pasajeros: {$objViaje->getCantMax()}. \n";
        echo "Ingrese la nueva cantidad maxima: \n";
        $cantMaxN= trim(fgets(STDIN));
        $objViaje->setCantMax($cantMaxN);
        echo "la nueva cantidad es: ".$objViaje->getCantMax() ."\n";
        break;

case 7 :
        echo $objViaje;
        break;

    
}
} while($rta<>8);



/*FUNCIONES*/

//FUNCION QUE RECOGE LOS DATOS
function recogerDatos()
{ 
     echo "Ingrese Nombre del pasajero: \n";
    $nombrePasajero=trim(fgets(STDIN));
    echo "Ingrese apellido del pasajero: \n";
    $apellidoPasajero=trim(fgets(STDIN));
    echo "Ingrese dni del pasajero: \n";
    $dniPasajero=trim(fgets(STDIN));
    $arrayAsociativo=["nombre"=>$nombrePasajero,"apellido"=>$apellidoPasajero,"DNI"=>$dniPasajero];
    return $arrayAsociativo;
}

?>
