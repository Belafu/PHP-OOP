<?php
//include "Liquidable.php" ;


class Pyme extends Cliente implements Liquidable, Imprimible
{
  private $cuit;
  private $razonSocial;
  public function __construct($email,$pass,$cuit,$razonSocial,$cuenta){
    parent::__construct($email,$pass);
    $this->cuit = $cuit;
    $this->razonSocial = $razonSocial;
    $this->cuenta = $cuenta;
  }
  function setCuit(){
    $this->cuit=$cuit;
  }
  function setRazonSocial(){
    $this->razonSocial=$razonSocial;
  }
  function getRazonSocial(){
    return  $this->razonSocial;
  }

  function liquidarHaberes($persona,$monto){
    $persona->depositar($monto);
    $this->getCuenta()->debitar($monto*1.01,"Caja");
    //descontar de la pyme en su cuenta 1%
  }
  public function mostrar(){
     echo $this->razonSocial;
  }
}


 ?>
