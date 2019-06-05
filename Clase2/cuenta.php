<?php
/*
un constructor que permite inicializar el CBU.
6. Agregar un método abstracto para debitar cierto monto que reciba como parámetro
el monto y desde donde se está haciendo la transacción (cajero Banelco, cajero
Link, caja). Agregar otro método (no abstracto) que permita acreditar cierto monto (y
programar su comportamiento). (Tener en cuenta que cada método debe, además,
modificar la fecha de último movimiento)*/

abstract class Cuenta
{
  private $CBU;
  private $balance;
  private $fechaUltimo;

  public function __construct($CBU){
    $this->CBU = $CBU;
  }

  function getCBU(){
    return $this->CBU;
  }
  function setCBU(){
    $this->CBU=$CBU;
    return $this;
  }
  function getBalance(){
    return $this->balance;
  }
  function setBalance($valor){
    $this->balance=$valor;
    return $this;
  }
  function setFechaUltimo($valor){
    $this->fechaUltimo=$valor;
    return $this;
  }
  public abstract function debitar($monto,$cajero)
  {
    //es abstarcto : no se pone

  }



}



 ?>
