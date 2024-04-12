<?php
/*
1. Se registra la siguiente información: denominación, dirección, 
la colección de clientes, colección de motos y la colección de ventas realizadas.

2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.

3. Los métodos de acceso para cada una de las variables instancias de la clase.

4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
*/

class Empresa
{

    // Atributos.
    private $denominacion;
    private $direccion;
    private $colObjClientes;
    private $colObjMotos;
    private $colObjVentas;

    /** Metodo Constructor
     * @param STRING $denominacion
     * @param STRING $direccion
     * @param ARRAY $colObjClientes
     * @param ARRAY $colObjMotos
     * @param ARRAY $colObjVentas
     * */
    public function __construct($denominacion, $direccion, $colObjClientes, $colObjMotos, $colObjVentas)
    {

        // Incializacion
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colObjClientes = $colObjClientes;
        $this->colObjMotos = $colObjMotos;
        $this->colObjVentas = $colObjVentas;
    }

    /** Metodo de Acceso Get
     * @return STRING
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /** Metodo de Acceso Get
     * @return STRING
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /** Metodo de Acceso Get
     * @return ARRAY
     */
    public function getColObjClientes()
    {
        return $this->colObjClientes;
    }

    /** Metodo de Acceso Get
     * @return ARRAY
     */
    public function getColObjMotos()
    {
        return $this->colObjMotos;
    }

    /** Metodo de Acceso Get
     * @return ARRAY
     */
    public function getColObjVentas()
    {
        return $this->colObjVentas;
    }

    //-----Fin Metodo Get----------------------------------------------------------------

    /** Metodo de Acceso Set
     * @return STRING
     */
    public function setDenominacion($nuevaDenominacion)
    {
        return $this->denominacion = $nuevaDenominacion;
    }

    /** Metodo de Acceso Set
     * @return STRING
     */
    public function setDireccion($nuevaDireccion)
    {
        return $this->direccion = $nuevaDireccion;
    }

    /** Metodo de Acceso Set
     * @return ARRAY
     */
    public function setColObjClientes($nuevoColClientes)
    {
        return $this->colObjClientes = $nuevoColClientes;
    }

    /** Metodo de Acceso Set
     * @return ARRAY
     */
    public function setColObjMotos($nuevaColMotos)
    {
        return $this->colObjMotos = $nuevaColMotos;
    }

    /** Metodo de Acceso Set
     * @return ARRAY
     */
    public function setColObjVentas($nuevaColVentas)
    {
        return $this->colObjVentas = $nuevaColVentas;
    }

    //-----Fin Metodo Set----------------------------------------------------------------

    /** Metodo retornarMoto($codigoMoto)
     * metodo que recorre la colección de motos de la Empresa y 
     * retorna la referencia al objeto moto cuyo código 
     * coincide con el recibido por parámetro.
     */
    public function retornarMoto($codigoMoto){

        // incializacion
        $colMotos = $this->getColObjMotos();

        // busqueda de la moto a traves del codigo
        foreach ($colMotos as $moto) {

            if ($moto->getCodigo() == $codigoMoto) {

                // Retorna la moto si se encuentra una coincidencia en el código
                $objMoto = $moto;

            } else {

                // Retorna null si no se encuentra ninguna coincidencia
                $objMoto = null;
            }

        }
        
        return $objMoto;
    
    }

    /*
    Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado. 
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta
    */
    public function registrarVenta($colCodigosMoto, $objCliente){
        
    }

    public function __toString()
    {

        // incializacion
        $clientes = $this->getColObjClientes();
        $motos = $this->getColObjMotos();
        $ventas = $this->getColObjVentas();

        // presentacion de informacion de los atributos de la clase empresa
        $info = "\nDenominacion: " . $this->getDenominacion() . "\n";
        $info .= "\nDireccion: " . $this->getDireccion() . "\n";
        // col cliente
        $info .= "\nColeccion de Clientes:\n";
        for ($i = 0; $i < count($clientes); $i++) {

            // presentacion de informacion de la coleccion
            $info .= "\nNombre: " . $clientes[$i]->getNombre() . "\n";
            $info .= "\nApellido: " . $clientes[$i]->getApellido() . "\n";
            $info .= "\nCondicion: " . $clientes[$i]->getCondicion() . "\n";
            $info .= "\nTipo de DNI: " . $clientes[$i]->getTipoDni() . "\n";
            $info .= "\nNumero de DNI: " . $clientes[$i]->getNroDni() . "\n\n";
        }
        
        // col motos
        $info .= "\nColeccion de Motos:\n";
        for ($o = 0; $o < count($motos); $o++) {

            // presentacion de informacion de la coleccion
            $info .= "\nCodigo de la Moto: " . $motos[$o]->getCodigo() . "\n";
            $info .= "\nCosto de la Moto: " . $motos[$o]->getCosto() . "\n";
            $info .= "\nAño de Fabricacion: " . $motos[$o]->getAñoFabricacion() . "\n";
            $info .= "\nDescripcion de la Moto: " . $motos[$o]->getDescripcion() . "\n";
            $info .= "\nPorcentaje Incremento Anual: " . $motos[$o]->getPorIncrementoAnual() . "\n";
            $info .= "\nEstado de Stock: " . $motos[$o]->getStock() . "\n\n";
        }
        
        // col ventas
        $info .= "\nColeccion de Ventas: " . $this->getDireccion() . "\n";
        for ($u = 0; $u < count($ventas); $u++) {

            // presentacion de informacion de la coleccion
            $info .= "\nNumero de la Venta: " . $ventas[$u]->getNumero() . "\n";
            $info .= "Fecha de la Venta: " . $ventas[$u]->getFecha() . "\n";
            $info .= "Nombre Completo del Cliente: " . $ventas[$u]->getNombre() . " " . $ventas[$u]->getApellido() . "\n";
            $info .= "Tipo de ID del Cliente: " . $ventas[$u]->getTipoDni() . "\n";
            $info .= "Numero de ID del Cliente: " . $ventas[$u]->getNroDni() . "\n";
            $info .= "Estado del Cliente: " . $ventas[$u]->getCondicion() . "\n";
            $info .= "\n---------------------------------------------------------\n\n";
            $info .= "Informacion de la Moto: \n";
            // aca va 1 sola moto, no todas ya que es una venta
            $info .= "     Codigo de la Moto: " . $motos[$u]->getCodigo() . "\n";
            $info .= "     Costo de la Moto: " . $motos[$u]->getCosto() . "\n";
            $info .= "     Año de Fabricacion: " . $motos[$u]->getAñoFabricacion() . "\n";
            $info .= "     Descripcion de la Moto: " . $motos[$u]->getDescripcion() . "\n";
            $info .= "     Porcentaje Incremento Anual: " . $motos[$u]->getPorIncrementoAnual() . "\n";
            $info .= "     Estado de Stock: " . $motos[$u]->getStock() . "\n\n";
            $info .= "\nPrecio Final: " . $motos[$u]->getPrecioFinal() . "\n\n";
        }
    }
}
