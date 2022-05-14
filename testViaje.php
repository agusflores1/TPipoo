<?php
include "viaje.php";
//TP3
include "ViajeTerrestre.php";
include "ViajeAerolinea.php";
//
include "pasajero.php";
include "responsableV.php";

$arrayPasajeros=[];
$empresa="Empresa Transporte";
$importe=100;

echo "\n BIENVENIDO A VIAJE FELIZ \n
Ingrese los datos del viaje:  \n";
echo "------------------------\n";
echo "Ingrese codigo de viaje: \n ";
$codigo=trim(fgets(STDIN));
echo "Ingrese destino: \n ";
$destino=trim(fgets(STDIN));
echo "Ingrese cantidad maxima de pasajeros: \n ";
$cantMax=trim(fgets(STDIN));
echo "DATOS EMPLEADO RESPONSABLE DE VIAJE:  \n";
$objResponsableV=ingresarDatosEmpleado();

$objViaje=new viaje($codigo,$destino,$cantMax,$objResponsableV,$arrayPasajeros,$importe,0);

do{
echo "MENU. \n
1. Vender Viaje
2. Agregar Pasajero \n
3. Quitar Pasajero. \n
4. Modificar Pasajero. \n 
5. Modificar el código del viaje.\n
6. Modificar el destino del viaje.\n
7. Modificar la cantidad de asientos del viaje. \n
8. Modificar datos del Responsable de viaje. \n
9. Ver viaje. \n
10. Salir. \n"; ;
$rta=trim(fgets(STDIN));
 switch($rta)
{ 
case 1 :
       if($objViaje->disponibilidadLugar()==true)
       { 
        echo "QUE TIPO DE VIAJE PREFIERE? 1 (AEREO) o 2  (TERRESTRE): \n";
        $rta=trim(fgets(STDIN)); 

        if($rta==1)
        { $nombreAerolinea=$empresa;
         
        echo "viaje de (Ida y Vuelta) o (Ida): ";
        $tipoViaje=trim(fgets(STDIN));
        echo "INGRESE LOS DATOS DE VUELO: ";
        echo "Numero de Vuelo: ";
        $nroVuelo=trim(fgets(STDIN));
        echo "Categoria (Primera Clase) o (Turista): ";
        $categoria=trim(fgets(STDIN));
        echo "Cuantas escalas desea hacer? ";
        $escalas=trim(fgets(STDIN));

        $objViajeAereo=new ViajeAerolinea($codigo,$destino,$cantMax,$objResponsableV,$arrayPasajeros,$importe,$tipoViaje,$nroVuelo,$categoria,$nombreAerolinea,$escalas);
        $pasajeroNuevo=recogerDatos();
        echo $objViajeAereo;
        $total=$objViajeAereo->venderPasaje($pasajeroNuevo);
          //Agrego pasajero para poder visualizarlo en la opcion 9
        $objViaje->agregarPasajero($pasajeroNuevo);
        echo "\nPasaje vendido con exito! Total: ".$total."\n";
        }

        if($rta==2)
        {
        echo "ELIJA TIPO DE ASIENTO (Cama) o (Semicama): \n";
        $tipoAsiento=trim(fgets(STDIN));
        echo "viaje de (Ida y Vuelta) o (Ida): \n";
        $tipoViaje=trim(fgets(STDIN));
        $objViajeTerrestre=new ViajeTerrestre($codigo,$destino,$cantMax,$importe,$tipoViaje,$objResponsableV,$arrayPasajeros,$tipoAsiento);
        $pasajeroNuevo2=recogerDatos();
        echo $objViajeTerrestre;
        $total=$objViajeTerrestre->venderPasaje($pasajeroNuevo2);
        //Agrego pasajero para poder visualizarlo en la opcion 9
        $objViaje->agregarPasajero($pasajeroNuevo);
        echo "Pasaje vendido con exito! Total: ".$total."\n";
        }

}   

     else{echo "\nNo hay Disponibilidad de pasajes! \n";}
        
        break;
case 2 :
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
  
case 3 :
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

case 4 :
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

case 5 :
        echo "El codigo de el viaje es: {$objViaje->getCodigoViaje()}. \n";
        echo "Ingrese el nuevo código: \n";
        $codigoNuevo = trim(fgets(STDIN));
        $objViaje->setCodigoViaje($codigoNuevo);
        echo "el nuevo codigo es ".$objViaje->getCodigoViaje()."\n";
        break;

case 6:
        echo "El viaje posee el destino: {$objViaje->getDestino()}. \n";
        echo "Ingrese el nuevo destino: \n";
        $destinoNuevo = trim(fgets(STDIN));
        $objViaje->setDestino($destinoNuevo);
        echo "el nuevo destino es: ".$objViaje->getDestino()."\n";
        break;
case 7 :
        echo "Cantidad maxima de pasajeros: {$objViaje->getCantMax()}. \n";
        echo "Ingrese la nueva cantidad maxima: \n";
        $cantMaxN= trim(fgets(STDIN));
        $objViaje->setCantMax($cantMaxN);
        echo "la nueva cantidad es: ".$objViaje->getCantMax() ."\n";
        break;


case 8 :
       $nuevoEmpleado=ingresarDatosEmpleado();
       $objViaje->setResponsable($nuevoEmpleado);
         break;

case 9 : 
       
       echo $objViaje;
    
       // 
        break;



}} while($rta<>10);



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
    echo "Ingrese numero de telefono: \n";
    $telefono=trim(fgets(STDIN));
    $objPasajero=new Pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefono);
    return $objPasajero;
}

 function ingresarDatosEmpleado()
{   echo "Ingrese Nombre: \n";
    $nombreEmpleado= trim(fgets(STDIN));
    echo "Ingrese Apellido : \n";
    $apellidoEmpleado= trim(fgets(STDIN));
    echo "Ingrese Numero de Empleado: \n";
    $numeroEmpleado= trim(fgets(STDIN));
    echo "Ingrese numero de Licencia: \n";
    $numeroLicencia= trim(fgets(STDIN));
    $objResponsableV=new responsableV($numeroEmpleado,$numeroLicencia,$nombreEmpleado,$apellidoEmpleado);
   return $objResponsableV;
}



?>
