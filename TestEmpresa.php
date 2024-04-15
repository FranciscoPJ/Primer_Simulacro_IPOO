<?php
include_once "Clase_Cliente.php";
include_once "Clase_Moto.php";
include_once "Clase_Empresa.php";
include_once "Clase_Venta.php";

function mostrasColVentasXcliente($array){

    if ($array == null){
        echo "El cliente Solicitado No Tiene Ninguna Venta Registrada En Esta Sucursal.\n";
    }
    else{
        echo "Listado de Ventas: \n";
        for($j = 0; $j < count($array); $j++){
            echo $array[$j] . "\n";
        }
    }

}


// pricipal

//---------------------objetos clientes-----------------------------------------------
// 1) $objCliente1
$objCliente1 = new Cliente("Francisco", "Pandolfi", "Activo", "DNI", 12345);

// 1) $objCliente2
$objCliente2 = new Cliente("Luis", "Baudens", "Activo", "DNI", 54321);

//---------------------objetos motos-----------------------------------------------
// 2) $objMoto1 ($codigo, $costo, $añoFabricacion, $descripcion, $porIncrementoAnual, $stock)
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);

// 2) $objMoto2
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Patagonian Eagle 250", 70, true);

// 2) $objMoto3
$objMoto3 = new Moto(13, 999900, 2023, "Benelli Imperiale 400", 55, false);

//--------------------- objeto empresa -----------------------------------------------
// 4) $objEmpresa
$objEmpresa = new Empresa("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);

// 5)-------------------------------metodo registrarVenta([11,12,13], $objCliente)--------
echo "--------------------------- ejercicio 5 ----------------------------------------\n";
echo "El valor total es: $" . $objEmpresa->registrarVenta([11,12,13], $objCliente2) . "\n";

// 6)-------------------------------metodo registrarVenta([0], $objCliente)---------------
echo "--------------------------- ejercicio 6 ----------------------------------------\n";
echo "El valor total es: $" .$objEmpresa->registrarVenta([11], $objCliente1) . ". Porque no existe tal codigo en la Base de Datos.\n";

// 7)-------------------------------metodo registrarVenta([2], $objCliente)---------------
echo "--------------------------- ejercicio 7 ----------------------------------------\n";
echo "El valor total es: $" . $objEmpresa->registrarVenta([2], $objCliente2) . ". Porque no existe tal codigo en la Base de Datos.\n";

// 8)---------$objCliente1-----------retornarVentasXCliente($tipo, $numDoc)---------------
echo "--------------------------- ejercicio 8 ----------------------------------------\n";
$colCliente1 = $objEmpresa->retornarVentasXCliente("DNI", 12345);
mostrasColVentasXcliente($colCliente1);

// 9)---------$objCliente2-----------retornarVentasXCliente($tipo, $numDoc)---------------
echo "--------------------------- ejercicio 9 ----------------------------------------\n";
$colCliente2 = $objEmpresa->retornarVentasXCliente("DNI", 54321);
mostrasColVentasXcliente($colCliente2);


// 10)-----------------Realizar un echo de la variable Empresa creada en 2.---------------
echo "--------------------------- ejercicio 10 ---------------------------------------\n";
echo $objEmpresa;
?>