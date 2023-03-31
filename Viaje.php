<?php

class Viaje {
    // La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información
    // referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino,
    // cantidad máxima de pasajeros y los pasajeros del viaje.
    // Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar
    // los atributos de dicha clase (incluso los datos de los pasajeros). 
    // Utilice un array que almacene la información correspondiente a los pasajeros. 
    // Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
    
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $listaPasajeros;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $listaPasajeros){
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->listaPasajeros = $listaPasajeros;
    }

    // SETTERS
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function setListaPasajeros($listaPasajeros){
        $this->listaPasajeros = $listaPasajeros;
    }

    // GETTERS
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getListaPasajeros(){
        return $this->listaPasajeros;
    }

    public function __toString(){
        return "\nCodigo de Viaje: " . $this->getCodigo() . "\n".
               "Destino: " . $this->getDestino() . "\n".
               "Cantidad Maxima de Pasajeros: " . $this->getCantMaxPasajeros() . "\n".
               "Lista de Pasajeros: ". $this->verPasajeros($this->getListaPasajeros()) ;
    }
  

    /** FUNCION QUE CARGA PASAJERO NUEVO AL LISTADO
     * 
     */
    public function cargarPasajero(){
    $lista = $this->getlistaPasajeros();
    $nombre = "";
    $apellido = "";
    $dni = "";
    $cant = count($lista);

    if ($this->cantMaxPasajeros > $cant ){
        echo "\nNuevo pasajero \n".
        "Ingrese nombre:";
        $nombre = trim(fgets(STDIN));
        echo "\nIngrese Apellido:";
        $apellido = trim(fgets(STDIN));
        echo "\nIngrese documento:";
        $dni = trim(fgets(STDIN));    
        $lista[$cant] = ["nombre"=>$nombre, "apellido"=>$apellido, "DNI"=>$dni];
    } else{
        echo "\nLa cantidad maxima de pasajeros ya fue alcanzada.";
    }
    $this->setListaPasajeros($lista);
    }


    /** FUNCION QUE EDITA DATOS DE UN PASAJERO
     * 
     */
    public function editarPasajero(){
        $lista = $this->getlistaPasajeros(); // array de pasajeros
        $verLista = $this->verPasajeros($lista); // string de lista pasajeros
        
        // inicializo nroPasajero que es el indice del array Pasajero
        $nroPasajero = 0;

        echo $verLista;
        echo "\nIngrese el numero de pasajero a modificar: ";
        $nroPasajero = (trim(fgets(STDIN)) - 1);
        echo "\nQue desea editar del pasajero?: ".
             "\n Nombre (presione N)".
             "\n Apellido (presione A)".
             "\n Documento (presione D)\n";
        $rta = trim(fgets(STDIN));

        if ($rta == "N"){
            $nombre = "";
            echo "\nIngrese nuevo nombre: ";
            $nombre = trim(fgets(STDIN));
            $lista[$nroPasajero]["nombre"] = $nombre;
        } elseif ($rta == "A"){
            $apellido = "";
            echo "\nIngrese Apellido:";
            $apellido = trim(fgets(STDIN));
            $lista[$nroPasajero]["apellido"] = $apellido;
        } elseif ($rta == "D"){
            $dni = "";
            echo "\nIngrese documento:";
            $dni = trim(fgets(STDIN)); 
            $lista[$nroPasajero]["DNI"] = $dni;
        } else {
            echo "No ingresó una opcion valida. ";
        }
        $this->setListaPasajeros($lista);
    }

    /** MODULO VER LISTADO DE PASAJEROS
    * Retorna el listado de pasajeros unido en un string
    */
    public function verPasajeros($pasajeros){
    $cant = count($pasajeros);
    $piso = 0;
    $listado = "";
    while ( $piso < $cant){
        $listado = $listado . "\n" . ($piso+1)."° Pasajero: " . $pasajeros[$piso]["nombre"]." ".  $pasajeros[$piso]["apellido"] . " DNI: " . $pasajeros[$piso]["DNI"];
        $piso++;
    }
    return $listado;
    }

    /** MODULO EDITAR DATOS DEL VIAJE
    */
    public function editarViaje(){

        echo "Ingrese codigo del viaje \n".
             "(anterior: ". $this->getCodigo().")\n". 
             "Nuevo: " ;
        $codigo = trim(fgets(STDIN));
        $this->setCodigo($codigo);
        
        echo "Ingrese destino del viaje: \n".
        "(anterior: ". $this->getDestino().")\n". 
        "Nuevo: " ;
        $destino = trim(fgets(STDIN));
        $this->setDestino($destino) ;
        
        echo "Ingrese cantidad maxima de pasajeros en el viaje\n".
             "(anterior: ". $this->getCantMaxPasajeros().")\n". 
             "Nuevo: " ;;
        $cantMaxPasajeros = trim(fgets(STDIN));
        $this->setCantMaxPasajeros($cantMaxPasajeros);

        echo "Desea que desea realizar: \n". 
             "1. Editar datos de los pasajeros \n".
             "2. Borrar Listado de Pasajeros \n". 
             "3. Finalizar carga de datos \n";
        $rta = trim(fgets(STDIN));

        if ($rta == 1){
            $this->editarPasajero();
            echo "Carga Finalizada";   
        } elseif($rta == 2){
            $this->setListaPasajeros([]);
            echo "Carga Finalizada";
        }else {
            echo "Carga Finalizada";
        }
    }

    //
    /** MODULO CARGA NUEVO VIAJE
    */
    public function cargarViaje(){

        echo "Ingrese codigo del viaje\n";
        $codigo = trim(fgets(STDIN));
        $this->setCodigo($codigo);
        
        echo "Ingrese destino del viaje: \n";
        $destino = trim(fgets(STDIN));
        $this->setDestino($destino) ;
        
        echo "Ingrese cantidad maxima de pasajeros en el viaje\n";
        $cantMaxPasajeros = trim(fgets(STDIN));
        $this->setCantMaxPasajeros($cantMaxPasajeros);

        echo "Ingrese que desea realizar: \n". 
             "1. Editar datos de los pasajeros \n".
             "2. Borrar Listado de Pasajeros \n". 
             "3. Finalizar carga de datos \n";
        $rta = trim(fgets(STDIN));

        if ($rta == 1){
            $this->editarPasajero();
            echo "Carga Finalizada";   
        } elseif($rta == 2){
            $this->setListaPasajeros([]);
            echo "Carga Finalizada";
        }else {
            echo "Carga Finalizada";
        }
    }
}
?>