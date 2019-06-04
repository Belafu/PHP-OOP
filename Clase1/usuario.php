<?php
include "pdo.php";

class Usuario
{
  private $id;
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
  function getUsuario(){
    return $this -> id;
  }
  function setUsuario($id){
    $this -> id =$id;
    return $this;
  }
  function saludar(){
    echo "Hola ".$this->getNombre();
  }
  function getNombre(){
    return $this -> nombre;
  }
  function getMail(){
    return $this -> mail;
  }
  function getPass(){
    return $this -> pass;
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
    echo "Descripccion: ".$this->celu->getMarca()." ".$this->celu->getModelo();
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
  function sabeHacer($string,$puntaje){
    foreach (($this->habilidades) as $habilidad) {
      if ($habilidad->getNombre()==$string && $habilidad->getExpertise() > $puntaje) {
        return true;
      }
    }
    return false;
  }
  //SE TOMO LA DESICION DE QUE al guardar la db le asigne un id
  function existeID($id){
    global $db;
    $stmt = $db->prepare("SELECT * FROM usuarios where id = :id ");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $search = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($search) {
      return true;
    }
    return false;
  }
  function tieneIDenLaBd(){
    global $db;
    $stmt = $db->prepare("SELECT * FROM usuarios where nombre = :nombre ");
    $stmt->bindValue(":nombre", $this->getNombre());
    $stmt->execute();
    $search = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($search) {
      return $search["id"];
    }
    return false;
  }

  function guardar(){
    global $db;
    if ($this->getUsuario() == null) {
      $stmt = $db->prepare("INSERT INTO usuarios VALUES(null, :nombre, :mail, :pass, :id_celu) ");
      $stmt->bindValue(":nombre", $this->getNombre());
      $stmt->bindValue(":mail", $this->getMail());
      $stmt->bindValue(":pass", $this->getPass());
      $stmt->bindValue(":id_celu", '1');
      //NO SE COMO ACCEDERIA AL ID DEL CELU? HACE FALTA AGREGARLE al codigo de celular.php id o se lo extraigo de la base que se la consede???
      $stmt->execute();
    }else {
        if ($this->existeID($this->getUsuario())) {
            $stmt = $db->prepare("UPDATE usuarios SET nombre = :nombre, mail = :mail , pass = :pass WHERE id = :id ");
            $stmt->bindValue(":nombre", $this->getNombre());
            $stmt->bindValue(":mail", $this->getMail());
            $stmt->bindValue(":pass", $this->getPass());
            $stmt->bindValue(":id", $this->getUsuario());
            $stmt->execute();
        }else {
          echo "NO existe ese ID en la db";
        }
    }
  }
  function eliminar(){
    global $db;
    //DONDE ESTA GUARDADO EL ID del usuario se lo consede la db ,hay que sacarlo de HAI
    if ($this->tieneIDenLaBd()) {
      $id = $this->tieneIDenLaBd();
      $stmt = $db->prepare("DELETE from usuarios  where id = '$id' ");
      $stmt->execute();
    }
  }


}

?>
