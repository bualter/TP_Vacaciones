<?php
include 'clases\Peliculas.php';

$pelis = Peliculas::ObtenerTodas();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

      <table>
         <tr>
           <th>Id</th>
           <th>Titulo</th>
           <th>Rating</th>
           <th>Awards</th>
           <th>Duracion</th>
           <th>GeneroID</th>
           <th></th>
           <th></th>
         </tr>
         <?php foreach ($pelis as $unaPelicula):?>
           <tr>
             <td><?= $unaPelicula->getId(); ?></td>
             <td><?= $unaPelicula->getTitulo(); ?></td>
             <td><?= $unaPelicula->getRating(); ?></td>
             <td><?= $unaPelicula->getAwards(); ?></td>
             <td><?= $unaPelicula->getDuracion(); ?></td>
             <td><?= $unaPelicula->getGenreId(); ?></td>
             <td><div><button type="submit" class="btn-primary">Editar</button></div></td>
             <td><div><button type="submit" class="btn-primary">Eliminar</button></div></td>
          </tr>
        <?php endforeach; ?>
       </table>
  </body>
</html>
