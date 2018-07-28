<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'Peliculas.php';

    $peliEncontrada = Peliculas::getPelicula("Avatar2");
    echo"{$peliEncontrada->getTitulo()}";
    echo("<br>");
    ?>

  </body>
</html>
