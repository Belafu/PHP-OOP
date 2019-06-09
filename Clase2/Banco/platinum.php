<?php
//Platinum: 5% desde cualquier medio, a menos que la cuenta tenga un balance de 5.000 o más.
//iii.Si es Platinum el banco no retiene nada.
//c.Si el cliente tiene una cuenta Platinum el banco cobra un 10% del total delbalance de la cuenta.

//include "cuenta.php" ;BORRA ESTO PARA QUE TE COMPILE BIEN ESTA VISTA
class Platinum extends Cuenta
{
  public function __construct($CBU,$balance,$fechaUltimo){
    parent::__construct($CBU);
    $this->balance = $balance;
    $this->fechaUltimo = $fechaUltimo;
  }

  public function debitar($monto,$cajero){
    if ($this->balance >5000) {
      $this->balance -=$monto;
    }else {
      $this->balance -=$monto*1.05;
    }
    $this->setFechaUltimo();
  }
    //funcion acreditar() no retiene nada igual que la que hereda de su padre
  public function pagarBanco($cliente){
      $this->balance *= 0.9;
  }


}

 ?>
