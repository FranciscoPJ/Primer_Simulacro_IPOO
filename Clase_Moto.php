<?php
/*
En la clase Moto:
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario).

2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.

3. Los métodos de acceso de cada uno de los atributos de la clase.

4. Redefinir el método toString para que retorne la información de los atributos de la clase.

5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
*/

class Moto{

    // Inicializacion
    private $codigo;
    private $costo;
    private $añoFabricacion;
    private $descripcion;
    private $porIncrementoAnual;
    private $stock;

    /** Metodo Constructor
     * 
     * @param INT $codigo
     * @param INT $costo
     * @param INT $añoFabricación
     * @param STRING $descripción
     * @param INT $porIncrementoAnual
     * @param BOOLEAN $stock
     * */
    public function __construct($codigo, $costo, $añoFabricacion, $descripcion, $porIncrementoAnual, $stock){

        // Incializacion
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->añoFabricacion = $añoFabricacion;
        $this->descripcion = $descripcion;
        $this->porIncrementoAnual = $porIncrementoAnual;
        $this->stock = $stock;
        
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getCodigo(){
        return $this->codigo;
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getCosto(){
        return $this->costo;
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getAñoFabricacion(){
        return $this->añoFabricacion;
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    /** Metodo de Acceso Get
     * 
     */
    public function getPorIncrementoAnual(){
        return $this->porIncrementoAnual;
    }

    /** Metodo de Acceso Get
     * 
     */
    public function getStock(){
        return $this->stock;
    }

    //-----Fin Metodo Get----------------------------------------------------------------

    /** Metodo de Acceso Set
     * @param INT $nuevoCodigo
     * @return INT
     */
    public function setCodigo($nuevoCodigo){
        return $this->codigo = $nuevoCodigo;
    }

    /** Metodo de Acceso Set
     * @param INT $nuevoCosto
     * @return INT
     */
    public function setCosto($nuevoCosto){
        return $this->costo = $nuevoCosto;
    }

    /** Metodo de Acceso Set
     * @param INT $nuevoAñoFabricacion
     * @return INT
     */
    public function setAñoFabricacion($nuevoAñoFabricacion){
        return $this->añoFabricacion = $nuevoAñoFabricacion;
    }

    /** Metodo de Acceso Set
     * @param STRING $nuevaDescripcion
     * @return STRING
     */
    public function setDescripcion($nuevaDescripcion){
        return $this->descripcion = $nuevaDescripcion;
    }

    /** Metodo de Acceso Set
     * @param INT $nuevoPorIncrementoAnual
     * @return INT
     */
    public function setPorIncrementoAnual($nuevoPorIncrementoAnual){
        return $this->porIncrementoAnual = $nuevoPorIncrementoAnual;
    }

    /** Metodo de Acceso Set
     * @param BOOLEAN $nuevoStock
     * @return BOOLEAN
     */
    public function setStock($nuevoStock){
        return $this->stock = $nuevoStock;
    }

    //-----Fin Metodo Set----------------------------------------------------------------

    /** Metodo darPrecioVenta
     * Metodo que calcula el valor por el cual puede ser vendida una moto.
     * Si la moto no se encuentra disponible para la venta retorna un valor < 0.
     * Si la moto está disponible para la venta, el método realiza el siguiente cálculo
     * @return INT
     */
    public function darPrecioVenta(){

        // Inicializacion
        $compra = $this->getCosto();
        $anio = (2024 - $this->getAñoFabricacion());
        $porIncAnual = $this->getPorIncrementoAnual();
        $stock = $this->getStock();

        if ($stock == true){

            // esta disponible y realiza el calculo que obtiene el valor total de la moto a venderse
            $venta = $compra + $compra * ($anio * $porIncAnual);

        }
        else{
            
            // no esta disponible la moto
            $venta = -1;

        }

        return $venta;

    }

    /** Metodo toString
     * 
     * @return STRING
     */
    public function __toString(){
        
        // inicializacion
        $verificarStock = $this->getStock();

        //verrificacion de true o false de stock de la moto
        if($verificarStock == true){
            $respuesta = "true";
        } else {
        $respuesta = "false";
        }
        
        // presentacion de informacion
        $info = "     Codigo de la Moto: " . $this->getCodigo() . "\n";
        $info .= "     Costo de la Moto: " . $this->getCosto() . "\n";
        $info .= "     Año de Fabricacion: " . $this->getAñoFabricacion() . "\n";
        $info .= "     Descripcion de la Moto: " . $this->getDescripcion() . "\n";
        $info .= "     Porcentaje Incremento Anual: " . $this->getPorIncrementoAnual() . "%\n";
        $info .= "     Estado de Stock: " . $respuesta . "\n";

        return $info;

    }

    
}
?>