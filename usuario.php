<?php
/*0. Crear una clase llamada Habilidad. La misma debe tener dos atributos: nombre y
expertise (expertise es un número entre 0 y 5). Definir los atributos como privados.
Definir los getters, setters y constructor de la clase.
21. Agregar en la clase Usuario la posibilidad de que un Usuario pueda tener muchas
Habilidades
22. Modificar las instancias en prueba.php para que cada usuario tenga 3 habilidades.
23. Agregar en la clase Usuario el método sabeHacer la misma recibe un string y un
puntaje. La función devuelve verdadero únicamente si el string recibido es el nombre
de una de las habilidades del usuario y si el puntaje es menor al expertise del
usuario en esa habilidad. En caso contrario, retorna falso.*/



class Usuario
{
  private $nombre;
  private $mail;
  private $pass;
  private $celu ;
  private $habilidades;
//  function __construct(){   NO SIRVE CHILLA SOLO UN CONSTRCUTOR}
  function __construct($nombre,$mail,$pass, $celu,$habilidades)
  {
    $this->nombre = $nombre;
    $this->mail = $mail;
    $this->setPass($pass);
    $this->celu = $celu;
    $this->habilidades = $habilidades;
  }
  function saludar(){
    echo "Hola ".$this->getNombre();
  }
  function getNombre(){
    echo $this -> nombre;
  }
  function getMail(){
    echo $this -> mail;
  }
  function getPass(){
    echo $this -> pass;
  }
  //convencion de los setters
  function setNombre($nombre){
    return $this;
  }//y es raro pero sirve para concatenar cosas
  function setMail($mail){
    $this -> mail = $mail;
  }
  function setPass($pass){
    $this->pass = $this ->encriptarPass($pass);
  }
  private function encriptarPass($string){
      $hash = password_hash($string,PASSWORD_DEFAULT);
      return $hash;
  }
  function mostrarTelefono(){
    echo "Descripccion: ".$this->celu->getMarca().$this->celu->getModelo();
    if (($this->celu->getMarca())=="Apple") {
      echo " y soy fan de los iphones";
    }
  }
  function llamar($usuario,$minutos){
    if( getProveedor($this->celu) == getProveedor($usuario->mostrarTelefono()) ) {
      return 0;
    }
    return 10*$minutos;
  }

}






?>
