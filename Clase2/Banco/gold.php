<?php
//Gold: Desde Banelco y Caja no se agrega importe extra. Desde Link un 5% mas.
//ii.Se queda con un 3% si es Gold, salvo que se esté acreditando 25.000o más.
//Si el cliente tiene cuenta Gold, el banco cobra $10 por cada letra del apellido del cliente o $5 por cada letra de la razón social.

//include "cuenta.php" ; TODAS ESTAN EN PRUEBAS

class Gold extends Cuenta
{
  public function __construct($CBU,$balance,$fechaUltimo){
    parent::__construct($CBU);
    $this->balance = $balance;
    $this->fechaUltimo = $fechaUltimo;
  }

  public function debitar($monto,$cajero){
    if ($cajero=="Banelco" || $cajero=="Caja" ) {
      $this->balance -=$monto;
    }
    if ($cajero=="Link") {
      $this->balance -=$monto*1.05;
    }
    $this->setFechaUltimo();
  }
  function acreditar($monto){
    parent::acreditar($monto);
    if ($this->balance <=25000) {
      //Te quito plata el banco 3%
      $this->balance-=$monto*0.03;
    }
  }
  public function pagarBanco($cliente){
    if ($cliente instanceof Persona ) {
      $cantLetras = strlen($cliente->getApellido());
      $this->balance -=$cantLetras*10;
    }
    //supongo que solo intruduciran un tipo de dato cliente momento lo puedo  BINDEAR
      $cantLetras = strlen($cliente->getRazonSocial());
      $this->balance -=$cantLetras*5;
  }

}

 ?>
