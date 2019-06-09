<?php
//include "imprimible.php" ;
abstract class Cuenta  implements  Imprimible
{
  protected $CBU;
  protected $balance;
  protected $fechaUltimo;

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
  function setFechaUltimo(){
    $this->fechaUltimo=date("Y-m-d H:i:s");
    return $this;
  }
  //ASI SE ESCRIBE UNA FUNCION ABSTRACTA
  public abstract function debitar($monto,$cajero);
  function acreditar($monto){
    $this->balance+=$monto;
  }
  public function pagarBanco(Cliente $cliente){}

    public function mostrar(){
       echo $this->balance;
    }

}

 ?>
