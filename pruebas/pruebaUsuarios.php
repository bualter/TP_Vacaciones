<?php
require_once '..\clases\usuarios.php';
// Probando usuarios
$usuarios = usuarios::getTodes();
foreach ($usuarios as $unUsuario) {
  echo $unUsuario->getName();
  echo("<br>");
}
?>
