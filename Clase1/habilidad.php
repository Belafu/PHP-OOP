<?php
/*
c.Si el usuario ya tiene id asignado debe realizarse un update
27.Agregarle al usuario el método ​eliminar ​​que lo elimine de la base de datos en casode ya tener id asignado.
*/

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
  function getExpertise(){
    return $this->expertise;
  }
}






?>
