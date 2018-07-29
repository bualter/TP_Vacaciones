<?php
require_once '..\clases\Peliculas.php';
$peliEncontrada = Peliculas::getPelicula("Avatar");
echo"{$peliEncontrada->getTitulo()}";
echo("<br>");
?>
