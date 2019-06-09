<?php

//Defino variables privadas para la clase Cliente

abstract Class Cliente{

  protected $email;
  protected $pass;
  protected $cuenta;
//Creo una función constructora con sus parámetros necesarios

  public function __construct($email,$pass){
    $this->email = $email;
    $this->pass = $pass;
  }

  //Creo funciones públicas para setear el valor pasado como parámetro al ejecutar la función constructora, como valor de la propiedad del objeto instanciado

  public function setEmail($email){
    $this->email = $email;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setPass($pass){
    $this->pass = $pass;
  }
  public function getPass(){
    return $this->pass;
  }
  public function setCuenta($cuenta){
    $this->cuenta = $cuenta;
  }
  public function getCuenta(){
    return $this->cuenta;
  }
  public function pagarServicios(){
    $this->cuenta->pagarBanco($this);
  }
}
