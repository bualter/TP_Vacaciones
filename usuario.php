<?php

class usuario{
  public $id;
  public $name;
  public $email;


  public function __construct($usrID, $usrName, $usrEmail){
    $this->id = $usrID;
    $this->name = $usrName;
    $this->email = $usrEmail;
  }

  public function registrar(){


  }

  public function logear(){

  }

  public function getName(){
      return $this->name;
  }


}

 ?>
