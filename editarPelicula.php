<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>Edicion de Peliculas</h1>
    <form class="" action="" method="post">
      Titulo
      <input type="text" name="nombre" value="" placeholder="Titulo">
      <br>
      Rating
      <input type="text" name="nombre" value="" placeholder="Rating">
      <br>
      Awards
      <input type="text" name="nombre" value="" placeholder="Awards">
      <br>
      Duracion
      <input type="text" name="nombre" value="" placeholder="Duracion">
      <br>
      Genero
      <div>
       <select class="selectpicker form-control input-lg" name="genre" id="genre">
        <option readonly="readonly" selected value='-1'>Genre</option>
        <?php
              require_once("db\connect.php");
              $CadenaDeBusqueda = "SELECT id, name FROM genres";
              $ConsultaALaBase = $db->prepare($CadenaDeBusqueda);
              $ConsultaALaBase->execute();


              while($genre = $ConsultaALaBase->fetch(PDO::FETCH_ASSOC)):
          ?>

                <option  value=<?=$genre['id'];?>><?=$genre['name'];?></option>

              <?php endwhile; ?>

          </select>
        </div>
        <!-- <input type="text" name="genere" value="" id="genre" class="form-control input-lg" placeholder="Genre" tabindex="3"> -->
      <br>
      <br>
      <button type="submit" name="button">Enviar</button>
   </form>


  </body>
</html>
