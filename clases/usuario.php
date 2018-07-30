<?php
require("usuarios.php");
session_start();

class usuario{
  private $id;
  private $name;
  private $email;
  private $password;

  public function __construct($usrID, $usrName, $usrEmail, $usrPass){
    $this->id = $usrID;
    $this->name = $usrName;
    $this->email = $usrEmail;
    $this->password = $usrPass;
  }

  public function getId(){
      return $this->id;
  }

  public function getName(){
      return $this->name;
  }

  public function getEmail(){
      return $this->email;
  }

  public function getPassword(){
      return $this->password;
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

    $this->password = password_hash($this->password, PASSWORD_DEFAULT);

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

  public function validarLogin() {
    $arrayADevolver = [];

    if ($this->email == '') {
      $arrayADevolver['email-login'] = 'Completá tu email.';
    } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $arrayADevolver['email-login'] = 'Debes ingresar un formato válido de email.';
    } else if (!$usuarioLogueado = usuarios::existeEmail($this->email)){
      $arrayADevolver['email-login'] = 'Mail inexistente en la base.';
    } else{  //hago esto si encontre el mail en la base, si no, ni lo hago
      if ($this->password == '') {
        $arrayADevolver['password-login'] = 'Debes completar tu contraseña';
      } elseif (!password_verify($this->password,$usuarioLogueado->getPassword())){
        $arrayADevolver['password-login'] = 'Contraseña incorrecta.';
      }
    }

    if (!$arrayADevolver){   // si no hubo errores
      $this->id = $usuarioLogueado->getId();
      $this->name = $usuarioLogueado->getName();
    }
    return $arrayADevolver;
  }

  public function loguear(){
    $_SESSION["email"] = $this->email;
  }

  public function estaLogueado() {
    if(isset($_SESSION["email"])){
      return usuarios::existeEmail($_SESSION["email"]);
    }
  }

}

 ?>
