<?php
require_once '..\clases\Peliculas.php';

// Probando peliculas
$pelis = array();
$pelis = Peliculas::ObtenerTodas();
foreach ($pelis as $unaPelicula) {
  echo"{$unaPelicula->getTitulo()}";
  echo("<br>");
}
?>
