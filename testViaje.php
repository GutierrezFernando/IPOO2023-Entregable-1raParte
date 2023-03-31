<?php

include 'Viaje.php';

$pasajeros = [];
$pasajeros[0] = ["nombre"=>"Martin", "apellido"=>"Martinez", "DNI"=>30123123];
$pasajeros[1] = ["nombre"=>"Carlos", "apellido"=>"Carliños", "DNI"=>45123456];

$Viaje = [];
$Viaje = new Viaje(1, "Iguazu", 10, $pasajeros);

echo "\nIngrese la opcion que desea realizar: \n".
     "1. Cargar viaje \n".
     "2. Editar viaje \n".
     "3. Cargar pasajero \n".
     "4. Editar pasajero \n";
$i = trim(fgets(STDIN))-1 ;

switch ($i){
    case 0:
        // cargo nuevo viaje
        $Viaje->cargarViaje();
        echo $Viaje;
        break;
    case 1:
        // edito un viaje 
        $this->editarViaje();
        echo $Viaje;
        break;
    case 2:
        // cargo nuevo pasajero
        $Viaje->cargarPasajero();
        echo $Viaje;
        break;
    case 3:
        // edito un pasajero
        $Viaje->editarPasajero();
        echo $Viaje;
        break;
}


?>
