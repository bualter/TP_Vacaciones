<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'Peliculas.php';

    $nuevaPeli = new pelicula(0, "Perfume de Mujer",10,5,90,3);

    $nuevaPeli->guardar();



     ?>
  </body>
</html>
