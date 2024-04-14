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
     * @return OBJECT
     */
    public function retornarMoto($codigoMoto)
    {

        // incializacion
        $colMotos = $this->getColObjMotos();
        $encontrado = false;
        $objMoto = null;
        $i = 0;

        // busqueda de la moto a traves del codigo solicitado
        while ($i < count($colMotos) && !$encontrado) {

            // verifica que si encontro la moto solicitada
            if ($colMotos[$i]->getCodigo() == $codigoMoto) {

                $encontrado = true;

                $objMoto = $colMotos[$i];
            }

            $i++;
        }

        return $objMoto;
    }

    /** Metodo registrarVenta($colCodigosMoto, $objCliente) 
     * retorna 0 si es null. retorna importe final de la venta
     * @param ARRAY $colCodigosMoto
     * @param OBJECT $objCliente
     * @return INT
     */
    public function registrarVenta($colCodigosMoto, $objCliente)
    {

        //incialiazcion
        $colVentas = $this->getColObjVentas();
        $colMotos = $this->getColObjMotos();
        $arrayCodigo = [];
        $acumMotos = 0;
        $i = 0;
        $u = 0;

        for ($u; $u < count($colMotos); $u++) {

            if ($colMotos[$u]->getCodigo() == $colCodigosMoto[$u]) {

                if ($colMotos[$u]->getStock() == true && $objCliente->getCondicion() == "Activo") {

                    $arrayCodigo[$i] = new Venta(count($colVentas), 2024,  $objCliente, $colMotos[$u], $colMotos[$u]->darPrecioVenta());

                    $acumMotos += $colMotos[$u]->darPrecioVenta();

                    $colVentas[count($colVentas)] = $arrayCodigo[$i];

                    $i++;
                }
            } else {

                $acumMotos;
            }
        } // fin for

        $this->setColObjVentas($colVentas); // se seteo el array por uno nuevo

        return $acumMotos;
    }

    /** Metodo retornarVentasXCliente($tipo,$numDoc)
     * Metodo que recibe por parámetro el tipo y número de documento de un Cliente 
     * y retorna una colección con las ventas realizadas al cliente.
     * @return ARRAY
     */
    public function retornarVentasXCliente($tipo, $numDoc)
    {

        // incializacion
        $colVenta = $this->getColObjVentas();
        $colCliente = $this->getColObjClientes();
        $countCliente = count($colCliente);
        $ventasCliente = [];

        // busqueda del cliente a traves de los parametros recibido
        for ($i = 0; $i < $countCliente; $i++) {

            // verifica si tipo y nro dni son correcto
            if ($colVenta[$i]->getObjCliente()->getTipoDni()  ==  $tipo && $colVenta[$i]->getObjCliente()->getNroDni() == $numDoc) {

                // se va almacenando cada venta que realizo el cliente
                $ventasCliente[$i] = $colVenta[$i];
            } // fin if

        } // fin for

        // retorna una colección con las ventas realizadas al cliente.
        return $ventasCliente;
    }

    public function __toString(){

        // incializacion
        $clientes = $this->getColObjClientes();
        $motos = $this->getColObjMotos();
        $ventas = $this->getColObjVentas();
        $listadoCli = "";
        $listadoMot = "";
        $listadoVent = "";

        // presentacion de informacion de los atributos de la clase empresa
        $info = "\nInformacion de la Empresa:\n";
        $info .= "*Denominacion: " . $this->getDenominacion() . "\n";
        $info .= "*Direccion: " . $this->getDireccion() . "\n";
        $info .= "*Listado de Clientes: \n";

        for($i = 0; $i < count($clientes); $i++){
            $cliente = $clientes[$i];
            $listadoCli .= $cliente . "\n";
        }

        $info .= $listadoCli;
        $info .= "*Listado de Motos: \n";
        
        for($u = 0; $u < count($motos); $u++){
            $vehiculo = $motos[$u];
            $listadoMot .= $vehiculo . "\n";
        }

        $info .= $listadoMot;
        $info .= "*Listado de Ventas: \n";
        
        for($o = 0; $o < count($ventas); $o++){
            $vent = $motos[$o];
            $listadoVent .= $vent . "\n";
        }

        $info .= $listadoVent;

        return $info;
        
    }

}
