<?php
require_once("clases\usuario.php");
$usuarioNuevo = new usuario("","","","");

$errores = [];

if($_POST){

  $usuarioNuevo = new usuario ("",  //en este caso el id no es necesario
                               $_POST["name"],
                               $_POST["email"],
                               $_POST["password"]);

  $errores = $usuarioNuevo->validar($_POST["rpassword"]);

  if (empty($errores)) {
  	if (count($errores) == 0) {
      $usuarioNuevo->registrar();
//      header('Location: registroLogIn.php?registroOK');
    }
  }

  if (count($errores) > 0) {
    $visible = 'flex';
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <div class="header-form">
    <h1>Registro al sitio de Peliculas<h1>
  </div>
</head>
<body>
  <?php if(isset($_GET['registroOK'])): ?>
    <div>Registro OK</div>
  <?php endif; ?>
  <div class="errors-container" style="display: <?php echo isset($visible) ? $visible : '' ; ?>">
    <div class="errors"
      <ul>
        <?php foreach ($errores as $error): ?>
          <li><?php echo $error ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="container">
    <form method="post">

    <div class="register"><h2>Registrate</h2></div>

    <div class="form-group">
        <label for="exampleInputName"></label>
        <input type="name" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp"  placeholder="Nombre" value="<?=$usuarioNuevo->getName()?>">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1"></label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="email" value="<?=$usuarioNuevo->getEmail()?>">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1"></label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Contraseña">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword2"></label>
      <input type="password" class="form-control" id="exampleInputPassword2" name="rpassword" placeholder="Confirma tu contraseña">
    </div>
    <br>
    <div><button type="createAccount" class="btn-primary">Crear</button></div>
    </form>
  </div>
  </body>
</html>
