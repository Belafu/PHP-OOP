<?php

class Persona extends Cliente implements Imprimible
{
  Private $nombre;
  Private $apellido;
  Private $documento;
  Private $nacimiento;
//  Private $cuenta; la hereda de Cliente

  public function __construct($nombre,$apellido,$documento,$nacimiento,$email,$pass,$cuenta){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->documento = $documento;
    $this->nacimiento = $nacimiento;
    parent::__construct($email,$pass);
    $this->cuenta = $cuenta;
  }


  public function setNombre($nombre){
    $this->nombre = $nombre;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setApellido($apellido){
    $this->apellido = $apellido;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function setDocumento($documento){
    $this->documento = $documento;
  }
  public function getDocumento(){
    return $this->documento;
  }
  public function setNacimiento($nacimiento){
    $this->nacimiento = $nacimiento;
  }
  public function getNacimiento(){
    return $this->nacimiento;
  }

  public function pagar($monto,$cajero){
    $this->getCuenta()->debitar($monto,$cajero);
  }
  public function depositar($monto){
    $this->getCuenta()->acreditar($monto);
  }
  public function mostrar(){
    echo $this->nombre . " " . $this->apellido;
  }
}



 ?>
