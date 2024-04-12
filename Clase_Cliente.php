<?php
/*
    En la clase Cliente:
    0. Se registra la siguiente información: nombre, apellido, 
    si está o no dado de baja, el tipo y el número de documento. 
    Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    
    1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
    
    2. Los métodos de acceso de cada uno de los atributos de la clase.
    
    3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
*/
class Cliente{

    // Atributos
    private $nombre;
    private $apellido;
    private $condicion;
    private $tipoDni;
    private $nroDni;

    /** Metodo Constructor
     * 
     * @param STRING $nombreCliente
     * @param STRING $apellidoCliente
     * @param STRING $condicionCliente
     * @param STRING $tipoDniCliente
     * @param INT $nroDniCliente
     * */
    public function __construct($nombreCliente, $apellidoCliente, $condicionCliente, $tipoDniCliente, $nroDniCliente){

        // Incializacion
        $this->nombre = $nombreCliente;
        $this->apellido = $apellidoCliente;
        $this->condicion = $condicionCliente;
        $this->tipoDni = $tipoDniCliente;
        $this->nroDni = $nroDniCliente;
        
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getNombre(){
        return $this->nombre;
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getApellido(){
        return $this->apellido;
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getCondicion(){
        return $this->condicion;
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getTipoDni(){
        return $this->tipoDni;
    }
    
    /** Metodo de Acceso Get
     * 
     */
    public function getNroDni(){
        return $this->nroDni;
    }

    //-----Fin Metodo Get----------------------------------------------------------------

    /** Metodo de Acceso Set
     * @param STRING $nuevoNombre
     * @return STRING 
     */
    public function setNombre($nuevoNombre){
        return $this->nombre = $nuevoNombre;
    }

    /** Metodo de Acceso Set
     * @param STRING $nuevoApellido
     * @return STRING 
     */
    public function setApellido($nuevoApellido){
        return $this->apellido = $nuevoApellido;
    }

    /** Metodo de Acceso Set
     * @param STRING $nuevaCondicion
     * @return STRING 
     */
    public function setCondicion($nuevaCondicion){
        return $this->condicion = $nuevaCondicion;
    }

    /** Metodo de Acceso Set
     * @param STRING $nuevoTipoDni
     * @return STRING
     */
    public function setTipoDni($nuevoTipoDni){
        return $this->tipoDni = $nuevoTipoDni;
    }

    /** Metodo de Acceso Set
     * @param INT $nuevoNroDni
     * @return INT 
     */
    public function setNroDni($nuevoNroDni){
        return $this->nroDni = $nuevoNroDni;
    }

    //-----Fin Metodo Set----------------------------------------------------------------

    /** Metodo toString
     * 
     * @return STRING
     */
    public function __toString(){
        
        // presentacion de informacion
        $info = "\nNombre: " . $this->getNombre() . "\n";
        $info .= "\nApellido: " . $this->getApellido() . "\n";
        $info .= "\nCondicion: " . $this->getCondicion() . "\n";
        $info .= "\nTipo de DNI: " . $this->getTipoDni() . "\n";
        $info .= "\nNumero de DNI: " . $this->getNroDni() . "\n";

        return $info;

    }
}
?>