<?php
include "usuario.php";  //usuario.php tiene
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
$juancho = new Usuario("JUANCHO","juan@dh.com","123",$galaxy,[$f,$d]);
//no te deja si la variable mail es private

var_dump($pedro,$juan);
echo "<hr>";

$juan->mostrarTelefono();
echo "<hr>";

var_dump($pedro->sabeHacer("fuerza",5));
echo "<hr>";

function mostrarUsuarios(){
  global $db;
//no quiere el id asi que ya no pongo el (*) en el select
  //$stmt = $db->prepare("SELECT nombre, mail, pass, Celulares_id FROM usuarios ");
  $stmt = $db->prepare("SELECT * FROM usuarios ");
  $stmt->execute();

  $search = $stmt->fetchAll(PDO::FETCH_CLASS);
  //fetchAll: ME DA UN ARRAY DE  (FETCH_CLAS) CLASES u Objetos
  //fetchAll: ME DA UN ARRAY DE  (FETCH_ASSOC) ARRAYS Asociativos
  var_dump($search);
}

mostrarUsuarios();
echo "<hr>";
//$juan->eliminar(); NO PASO nada porque juan no tenia id

echo "Agregar/Borrar Juan";
//1)
//$juan->guardar();
//2)
//$juancho->setUsuario(9)->guardar();//tiene que ser un id que este siendo usado en la bd
//3)
$juancho->eliminar();
mostrarUsuarios();

?>
