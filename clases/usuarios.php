<?php
//clase Universo
require_once("usuario.php");
  class Usuarios{

    public function getTodes(){

        //levantar todas los usuarios de la base
        //Me conecto a la base de datos
        require_once("..\db\connect.php");
        //Ejecuto la lectura
        $CadenaDeBusqueda = "SELECT * FROM users";
        $ConsultaALaBase = $db->prepare($CadenaDeBusqueda);
        $ConsultaALaBase->execute();
        $todes = $ConsultaALaBase->fetchAll(PDO::FETCH_ASSOC);

        //Declaro el array de objetos Usuarios
        $UsuariosADevolver=[];
        //Recorro cada registro que obtuve
      foreach ($todes as $UnRegistro){

          //Instancio un objeto de tipo Pelicula
          $UnUsuario = new usuario($UnRegistro["id"],
                                   $UnRegistro['name'],
                                   $UnRegistro['email']);
          //Agrego el objeto Usuario al array
          $UsuariosADevolver[] = $UnUsuario;
        }

      return $UsuariosADevolver;

  }

  public static function existeEmail($email) {
    require_once("db\connect.php");

    $cadenaDeBusqueda = "SELECT * FROM users WHERE email = :email";
    $consultaAlaBase = $db->prepare($cadenaDeBusqueda);
    $consultaAlaBase->bindParam(":email",$email,PDO::PARAM_STR);
    $consultaAlaBase->execute();

    if($usuarioAux = $consultaAlaBase->fetchAll(PDO::FETCH_ASSOC)){
      $usuarioBuscado   = new usuario($usuarioAux[0]['id'],
                                      $usuarioAux[0]['name'],
                                      $usuarioAux[0]['email'],
                                      $usuarioAux[0]['password']);

      return $usuarioBuscado;
    }else{
      return false;
    }
  }


//  INSERT INTO `movies_db`.`users` (`id`, `name`, `email`, `password`, `remember_token`) VALUES ('1', 'Walter', 'walterprueba@gmail.com', 'sarasa', 'sarasaaaaa');

}
 ?>
