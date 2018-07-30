<?php
require_once('clases\usuario.php');

$usuarioAVerificar = new usuario("","","","");

/*
if($usuarioLogueado = $usuarioAVerificar->estaLogueado()) {
//  header('location: perfil.php');
//  exit;
echo("el objeto<br>");
var_dump($usuarioLogueado);
echo("sarasasas<br>");
var_dump($usuarioLogueado->getEmail());
echo("<br>");
}
*/

$errores = [];

$name = "";
$email = "";
$password = "";
$rpassword = "";
$emailLogin = "";
$passwordLogin = "";

if($_POST){
  $usuarioAVerificar = new usuario("",
                                   "",
                                   trim($_POST["email-login"]),
                                   trim($_POST["password-login"]));

  $errores = $usuarioAVerificar->validarLogin();

  if (empty($errores)) {
    $usuarioAVerificar->loguear();
    if (isset($_POST["remember"])) {
       setcookie('email', $usuarioAVerificar->getEmail(), time() + 3600 * 24 * 30);
       }
    elseif(isset($_COOKIE['email'])) {
       setcookie('email', "");
    }
    header('location: perfil.php');
    exit;
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
<!--    <div class="remember-password"><input type="checkbox" checked="checked" name="remember"> Recordar contraseña</div>
-->
  </div>

</body>
</html>
