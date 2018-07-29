<?php
require("usuarios.php");

class usuario{
  private $id;
  private $name;
  private $email;
  private $password;

  public function __construct($usrID, $usrName, $usrEmail, $usrPass){
    $this->id = $usrID;
    $this->name = $usrName;
    $this->email = $usrEmail;

    if($usrPass){
      $this->password = password_hash($usrPass, PASSWORD_DEFAULT)
    }else {
      $this->password = $usrPass;
    }
    $this->root = false;
  }

  public function validar($rpassword){

    $errores = [];

    $this->name = trim($this->name);
    $this->email = trim($this->email);
    $this->password = trim($this->password);
    $rpassword = trim($rpassword);

    if ($this->name == '') {
        $errores['name'] = 'Debes completar tu nombre';
    }
    if ($this->email == '') {
        $errores['email'] = 'Debes completar tu email';
    } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Debes ingresar un formato válido de email';
    } elseif (usuarios::existeEmail($this->email)) {
          $errores['email'] = 'Esta dirección de email ya existe para otro usuario';
      }
    if ($this->password == '' || $rpassword == '') {
        $errores['password'] = 'Debes completar tu contraseña';
    } elseif ($this->password !== $rpassword) {
        $errores['password'] = 'Tus contraseñas no coinciden';
      }
    return $errores;
  }

  public function registrar(){
    require("db\connect.php");
    $sql = "INSERT INTO movies_db.users ( name,
                                          email,
                                          password,
                                          created_at)
            VALUES ('{$this->name}',
                    '{$this->email}',
                    '{$this->password}',
                    NOW())";

    $query= $db->prepare($sql);
    $query-> execute();
    $db= null;
  }

  public function logear(){
  }

  public function getName(){
      return $this->name;
  }

  public function getEmail(){
      return $this->email;
  }

}

 ?>
