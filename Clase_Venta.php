<?php

/*
En la clase Venta:
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de motos y el precio final.

2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada atributo de la clase.

3. Los métodos de acceso de cada uno de los atributos de la clase.

4. Redefinir el método _toString para que retorne la información de 
los atributos de la clase.

5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un 
objeto moto y lo incorpora a la colección de motos de la venta, siempre y cuando 
sea posible la venta. 

El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
*/

class Venta{

    // Atributos.
    private $numero;
    private $fecha;
    private $objCliente;
    private $colObjMotos;
    private $precioFinal;

    /** Metodo Constructor
     * 
     * @param INT $numero
     * @param INT $fecha
     * @param OBJECT $objCliente
     * @param ARRAY $colObjMotos
     * @param INT $precioFinal
     * */
    public function __construct($numero, $fecha, $objCliente, $colObjMotos, $precioFinal){

        // Incializacion
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colObjMotos = $colObjMotos;
        $this->precioFinal = $precioFinal;
        
    }

    /** Metodo de Acceso Get
     * @return INT
     */
    public function getNumero(){
        return $this->numero;
    }

    /** Metodo de Acceso Get
     * @return INT
     */
    public function getFecha(){
        return $this->fecha;
    }

    /** Metodo de Acceso Get
     * @return OBJECT
     */
    public function getObjCliente(){
        return $this->objCliente;
    }

    /** Metodo de Acceso Get
     * @return ARRAY
     */
    public function getColObjMotos(){
        return $this->colObjMotos;
    }
    
    /** Metodo de Acceso Get
     * @return INT
     */
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    //-----Fin Metodo Get----------------------------------------------------------------

    /** Metodo de Acceso Set
     * @param INT $nuevoNumero
     * @return INT 
     */
    public function setNumero($nuevoNumero){
        return $this->numero = $nuevoNumero;
    }

    /** Metodo de Acceso Set
     * @param INT $nuevaFecha
     * @return INT 
     */
    public function setFecha($nuevaFecha){
        return $this->fecha = $nuevaFecha;
    }

    /** Metodo de Acceso Set
     * @param OBJECT $nuevoObjCliente
     * @return OBJECT 
     */
    public function setObjCliente($nuevoObjCliente){
        return $this->objCliente = $nuevoObjCliente;
    }

    /** Metodo de Acceso Set
     * @param ARRAY $nuevoPrecioFinal
     * @return ARRAY
     */
    public function setColObjMotos($nuevoColObjMotos){
        return $this->colObjMotos = $nuevoColObjMotos;
    }

    /** Metodo de Acceso Set
     * @param INT $nuevoPrecioFinal
     * @return INT 
     */
    public function setPrecioFinal($nuevoPrecioFinal){
        return $this->precioFinal = $nuevoPrecioFinal;
    }

    //-----Fin Metodo Set----------------------------------------------------------------

    /** Metodo incorporarMoto($objMoto)
     * 
     */
    public function incorporarMoto($objMoto){
        
        // incializacion
        $colMotos = $this->getColObjMotos();
        $countMotos = count($colMotos);
        
        // verificacion si la moto esta activa o no para venderse
        if($objMoto->getStock() == true){ // true si puede venderse. false caso contrario

            // agrega una moto a la coleccion de motos
            $colMotos[$countMotos] = $objMoto;

            // actualiza la variable instancia precio final de la venta
            $this->setPrecioFinal($objMoto->darPrecioVenta());

        }

    }

    /** Metodo toString
     * Metodo que retorna la información de los atributos de la clase
     * @return STRING
     */
    public function __toString(){
        
        //incializacion
        $cliente = $this->getObjCliente();
        $moto = $this->getColObjMotos();

        // presentacion de informacion
        $info = "\nNumero de la Venta: " . $this->getNumero() . "\n";
        $info .= "Fecha de la Venta: " . $this->getFecha() . "\n";
        $info .= "Nombre Completo del Cliente: " . $cliente->getNombre() . " " . $cliente->getApellido() . "\n";
        $info .= "Tipo de ID del Cliente: " . $cliente->getTipoDni() . "\n";
        $info .= "Numero de ID del Cliente: " . $cliente->getNroDni() . "\n";
        $info .= "Estado del Cliente: " . $cliente->getCondicion() . "\n";
        $info .= "\n---------------------------------------------------------\n\n";
        $info .= "Informacion de la Moto: \n";
        // aca va 1 sola moto, no todas ya que es una venta
        for ($i = 0; $i < count($this->getColObjMotos()); $i++){

            $info .= "    Codigo de la Moto: " . $moto[$i]->getCodigo() . "\n";
            $info .= "     Costo de la Moto: " . $moto[$i]->getCosto() . "\n";
            $info .= "     Año de Fabricacion: " . $moto[$i]->getAñoFabricacion() . "\n";
            $info .= "     Descripcion de la Moto: " . $moto[$i]->getDescripcion() . "\n";
            $info .= "     Porcentaje Incremento Anual: " . $moto[$i]->getPorIncrementoAnual() . "\n";
            $info .= "     Estado de Stock: " . $moto[$i]->getStock() . "\n\n";
            
        }
        $info .= "\nPrecio Final: " . $this->getPrecioFinal() . "\n\n";

        return $info;

    }
}

?>