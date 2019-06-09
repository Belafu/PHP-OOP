<?php
include "imprimible.php" ;
include "liquidable.php" ;

include "cuenta.php" ;
include "classic.php" ;
include "gold.php" ;
include "platinum.php" ;

include "cliente.php" ;
include "persona.php" ;
include "multinacional.php" ;
include "pyme.php" ;

include "banco.php" ;

$cuentaC = new Classic("1234567891",8000,"2019-01-01");
$cuentaG = new Gold("9874563210",8000,"2019-01-01");
$cuentaP = new Platinum("4567891234",8000,"2019-01-01");
$jose = new Persona("Ale","Vivone",12343535,"1957-12-01","ale@dh.com","contraseña",$cuentaC);
$oreo = new Multinacional("oreo@dh.com","contraseña","77729518","CompanyOreo",$cuentaG);
$jorgito = new Pyme("jorgito@dh.com","contraseña","456123","CompanyJorgito",$cuentaP);

$banco = new Banco ;
$banco->agregarCliente($jose)->agregarCliente($oreo)->agregarCliente($jorgito);

var_dump($jose);
echo "<hr>";
echo "Pagar 500 por caja";
$jose->pagar(500,"Caja");
var_dump($jose->getCuenta());
echo "<br>";

echo "Acreditar (Aumentar 500) -  el interes del tipo de tarjeta que tenga";
$jose->depositar(500);
var_dump($jose->getCuenta());
echo "<hr>";
var_dump($banco->getClientes());
echo "<hr>";
echo "PAgen morosos";
$banco->cobroMensual();
//JORGITO TIENE 8000 con cuenta platino
var_dump($banco->getClientes());




 ?>
