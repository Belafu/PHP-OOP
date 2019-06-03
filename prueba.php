<?php
include "usuario.php";
include "celular.php";
include "habilidad.php";
//GUARDA CON LOS includeS REPETIDOS

$f = new Habilidad("fuerza",12);
$d = new Habilidad("defensa",4);
$a = new Habilidad("agilidad",2);

$motoE = new Celular("Motorola","motoE","Claro","1123452355");
$galaxy = new Celular("Samsung","Galaxy","Movistar","1123451234");


$pedro = new Usuario("pedro","pedro@gmail.com","111",$motoE,[$f,$d,$a]);
$juan = new Usuario("juan","juan@dh.com","123",$galaxy,[$f,$d]);
//no te deja si la variable mail es private

var_dump($pedro,$juan);
echo "<hr>";

$juan->mostrarTelefono();



?>
