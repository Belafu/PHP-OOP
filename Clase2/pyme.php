<?php
include "cliente.php" ;

class Pyme extends Cliente
{
  private $cuit;
  private $razonSocial;
  function setCuit(){
    $this->cuit=$cuit;
  }
  function setRazonSocial(){
    $this->razonSocial=$razonSocial;
  }
}


 ?>
