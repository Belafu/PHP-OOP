<?php
/*
22. Modificar las instancias en prueba.php para que cada usuario tenga 3 habilidades.
23. Agregar en la clase Usuario el método sabeHacer la misma recibe un string y un
puntaje. La función devuelve verdadero únicamente si el string recibido es el nombre
de una de las habilidades del usuario y si el puntaje es menor al expertise del
usuario en esa habilidad. En caso contrario, retorna falso.*/

class Habilidad
{
  private $nombre;
  private $expertise;
  function __construct($nombre,$expertise)
  {
    $this->nombre = $nombre;
    $this->expertise = $expertise;
  }
  function getNombre(){
    return $this->nombre;
  }
}






?>
