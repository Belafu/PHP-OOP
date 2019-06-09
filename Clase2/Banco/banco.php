<?php

class Banco
{
  //private $recaudacion;
  private $clientes =[];

  public function agregarCliente($nuevo){
    array_push($this->clientes,$nuevo);
    return $this; // para concatenar mas clientes
  }
  public function cobroMensual(){
    foreach(($this->clientes) as $c) {
      $c->pagarServicios();
    }
  }
  public function getClientes()
  {
    return  $this->clientes;
  }

}



 ?>
