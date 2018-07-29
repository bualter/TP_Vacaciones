<?php

require_once('funcionesProyectoFinal.php');

if(estaLogueado()) {
  header('location: perfil.php');
  exit;
}

$errores = [];

$name = "";
$email = "";
$password = "";
$rpassword = "";
$emailLogin = "";
$passwordLogin = "";

if($_POST){
  if(esLogin($_POST)){
    $emailLogin = trim($_POST["email-login"]);
    $passwordLogin = trim($_POST["password-login"]);

    $errores = validarLogin($_POST);

    if (empty($errores)) {

      $usuario = existeEmailYPassword($emailLogin, $passwordLogin);
      if ($usuario) {
        loguear($usuario);
        header('location: perfil.php');
        exit;
      } else {
        $errores[] = 'No estás registrado o verifica que tu usuario y/o contraseña sean correctos';
      }
    }
  } else {
    $name = trim($_POST["name"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $rpassword = trim($_POST["rpassword"]);

    $errores = validar($_POST);

    if (empty($errores)) {
  		if (count($errores) == 0) {
  			$usuario = crearArrayUsuario($_POST,'archivo');
  	    guardarUsuario($usuario);
        header('Location: registroLogIn.php?registroOK');
      }
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
    <h1>Login al sitio de Peliculas<h1>
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
      <div class="login"><h2>Login</h2></div>

      <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="email" name="email-login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email.com" value="<?=$emailLogin?>">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1"></label>
        <input type="password" name="password-login" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
      </div>
      <br>
      <div><button type="submit" class="btn-primary">INGRESA</button></div>
    </form>
    <div class="remember-password"><input type="checkbox" checked="checked" name="remember"> Recordar contraseña</div>

  </div>

</body>
</html>
