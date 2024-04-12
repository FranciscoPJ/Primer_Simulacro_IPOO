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

    /*
    "Alta Gama", 
    "Av Argenetina 123", 
    [$objMoto1, $objMoto2, $objMoto3], 
    [$objCliente1, $objCliente2], 
    []
    */

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
    public function retornarMoto($codigoMoto)
    {

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

    /** Metodo registrarVenta($colCodigosMoto, $objCliente) 
     * retorna 0 si es null. retorna importe final de la venta
     * @param ARRAY $colCodigosMoto
     * @param OBJECT $objCliente
     * @return INT
     */
    public function registrarVenta($colCodigosMoto, $objCliente)
    {

        /*
        "Alta Gama", 
        "Av Argenetina 123", 
        [$objMoto1, $objMoto2, $objMoto3], 
        [$objCliente1, $objCliente2], 
        []
        */

        //incialiazcion
        $cantMotosClienteComprar = count($colCodigosMoto);
        $colMotos = $this->getColObjMotos();
        $colVentas = $this->getColObjVentas();
        $countVentas = count($colVentas);
        $acumuladorMotosPrecioFinal = 0;
        $motoEncontrada = false;
        $masMotos = [];
        $i = 0;

        // se verifica si el cliente esta disponible para un registro de venta
        if ($objCliente->getCondicion() == "Activo") {

            // igual 1 moto
            if ($cantMotosClienteComprar == 1 && $colCodigosMoto[0] > 10) { // si el cliente quiere comprar 1 moto, se realiza este recorrido.

                // busqueda de la moto a traves del codigo como parametro
                while ($i < count($colMotos) && !$motoEncontrada) {

                    // Se verifica si el obj moto, esta en stock y tambien si el cliente esta activo. si no es asi, es false; no se guarda la moto en la col ventas
                    if ($colMotos[$i]->getCodigo() == $colCodigosMoto[$i] && $colMotos[$i]->getStock() == true) {

                        $motoEncontrada = true;

                        // se guarda el obj moto en una variable
                        $objMoto = $colMotos[$i];

                        // se almacena en la col ventas de la instancia venta
                        $colVentas[$countVentas] = $objMoto;

                        // se setea las variable de instancia venta
                        $this->setColObjVentas($colVentas);
                    } // fin verificacion moto

                    $i++;

                } // fin while
            } else { // mas de 1 moto

                if ($colCodigosMoto[0] > 10) { // distinto de cero

                    // busqueda de mas de una 1
                    for ($u = 0; $u < count($colMotos); $u++) {

                        $contadorMotos = 0;

                        // Se verifica si el obj moto, esta en stock y tambien si el cliente esta activo. si no es asi, es false; no se guarda la moto en la col ventas
                        if ($colMotos[$u]->getCodigo() == $colCodigosMoto[$u] && $colMotos[$u]->getStock() == true) {


                            // se guarda el obj moto en una variable
                            $masMotos[$contadorMotos] = $colMotos[$u];

                            // se almacena en la col ventas de la instancia venta
                            $colVentas[$countVentas] = $masMotos[$contadorMotos];

                            // se setea las variable de instancia venta
                            $this->setColObjVentas($colVentas);

                            $acumuladorMotosPrecioFinal += $colMotos[$u]->darPrecioVenta();

                            $contadorMotos++;
                        } // fin verificacion moto y acumulacion

                    } // fin for
                }
            }
        } // fin verificacion cliente   


        // se verifica si se registro la venta o no
        if ($cantMotosClienteComprar == 0 || $colCodigosMoto[0] < 11 || $motoEncontrada) {

            // si no esta registrado, retorna 0
            $importe = 0;
        } else { // se es true, se guarda el importe final

            if ($cantMotosClienteComprar == 1 && $objCliente->getCondicion() == "Activo" && $objMoto->getStock() == true) {

                // si esta registrado, retorna el importe final de la venta            
                $importe = $objMoto->darPrecioVenta();

            } else {

                // si son mas de 1 moto el monto va hacer mayor
                $importe = $acumuladorMotosPrecioFinal;
            }
        }
        // retorna 0 si es null. retorna importe final de la venta
        return $importe;
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

            return $info;
        }
    }
}
