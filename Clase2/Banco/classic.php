<?php

//include "cuenta.php" ; TODAS ESTAN EN PRUEBAS
class Classic extends Cuenta
{
  public function __construct($CBU,$balance,$fechaUltimo){
    parent::__construct($CBU);
    $this->balance = $balance;
    $this->fechaUltimo = $fechaUltimo;
  }

  public function debitar($monto,$cajero){
    if ($cajero=="Banelco") {
      $this->balance -=$monto*1.05;
    }
    if ($cajero=="Link") {
      $this->balance -=$monto*1.10;
    }
    if ($cajero=="Caja") {
      $this->balance -=$monto;
    }
    $this->setFechaUltimo();
  }
  public function acreditar($monto){
    parent::acreditar($monto);
    //Te quito plata el banco 5%
    $this->balance-=$monto*0.05;
  }
  public function pagarBanco($cliente){
      $this->balance -=100;
  }
}

 ?>
