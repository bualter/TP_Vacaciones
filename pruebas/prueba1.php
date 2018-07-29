<?php
require_once '..\clases\Peliculas.php';
require_once '..\clases\usuarios.php';

// Probando peliculas

$pelis = array();
$pelis = Peliculas::ObtenerTodas();

foreach ($pelis as $unaPelicula) {
    echo"{$unaPelicula->getTitulo()}";
    echo("<br>");
  }

// Probando usuarios
$usuarios = usuarios::getTodes();

foreach ($usuarios as $unUsuario) {
  echo $unUsuario->getName();
  echo("<br>");
}
?>
