<?php
//ESTANDAR LA FLECHITA JUNTA CON TODOS LOS DATOS

class Celular
{
  private $marca;
  private $modelo;
  private $proveedor;
  private $numero;
  function __construct($marca,$modelo,$proveedor,$numero)
  {
    $this->marca = $marca;
    $this->modelo = $modelo;
    $this->proveedor = $proveedor;
    $this->numero = $numero;
  }
  function getMarca(){
    //echo $this->marca;
    return $this->marca;
  }
  function getProveedor(){
    return $this->proveedor;
  }
  function getModelo(){
    return $this->modelo;
  }
}


?>
