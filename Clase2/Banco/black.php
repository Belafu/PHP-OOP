<?php
//iv.Black: No se cobra importe extra
//iv.0% para Black o 4% para montos superiores a 1.000.000
//d.Si el cliente tiene una cuenta Black, el banco cobra $500, más $100 multiplicado por el número de día de la semana en la que se hizo la últimatransacción.

//include "cuenta.php" ; TODAS ESTAN EN PRUEBAS

class Black extends Cuenta
{
  public function __construct($CBU,$balance,$fechaUltimo){
    parent::__construct($CBU);
    $this->balance = $balance;
    $this->fechaUltimo = $fechaUltimo;
  }

  public function debitar($monto,$cajero){
      $this->balance -=$monto;
  }

  public function acreditar($monto){
    parent::acreditar($monto);
    if ($this->balance <=1000000) {
      //Te quito plata el banco 4%
      $this->balance-=$monto*0.04;
    }
  }
  public function pagarBanco($cliente){
    $date = $this->fechaUltimo;
    $weekday = date('l', strtotime($date));
    $this->balance -=  500 + 100*$weekday;
  }
}

 ?>
