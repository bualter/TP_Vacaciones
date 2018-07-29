<?php
require_once '..\clases\Peliculas.php';
$peliEncontrada = Peliculas::getPelicula("Avatar");


if ($peliEncontrada) {
  echo"{$peliEncontrada->getTitulo()}";  // code...
} else {
  echo"No se encontro la pelicula";  // code...// code...
}

echo("<br>");
?>
