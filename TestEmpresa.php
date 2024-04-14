<?php
include_once "Clase_Cliente.php";
include_once "Clase_Moto.php";
include_once "Clase_Empresa.php";
include_once "Clase_Venta.php";

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

//---------------------objeto empresa-----------------------------------------------
// 4) $objEmpresa
$objEmpresa = new Empresa("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);

// 5)-------------------------------metodo registrarVenta([11,12,13], $objCliente)--------
echo "--------------------------- ejercicio 5 ----------------------------------------\n";
echo "El valor total es: $" .$objEmpresa->registrarVenta([11,12,13], $objCliente2) . "\n";
echo $objEmpresa . "\n";
//print_r($objEmpresa->getColObjVentas()) . "\n";






// 6)-------------------------------metodo registrarVenta([0], $objCliente)---------------
//echo "--------------------------- ejercicio 6 ----------------------------------------\n";
//echo "El valor total es: $" .$objEmpresa->registrarVenta([0], $objCliente2) . "\n";

// 7)-------------------------------metodo registrarVenta([2], $objCliente)---------------
//echo "--------------------------- ejercicio 7 ----------------------------------------\n";
//echo "El valor total es: $" .$objEmpresa->registrarVenta([2], $objCliente2) . "\n";

// 8)-------------------------------metodo registrarVenta([2], $objCliente)---------------
//echo "--------------------------- ejercicio 8 ----------------------------------------\n";
//echo "El valor total es: $" .$objEmpresa->retornarVentasXCliente($tipo,$numDoc) . "\n";


?>