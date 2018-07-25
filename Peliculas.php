<?php
require_once("pelicula.php");
// Esta seria la clase Universo
  class Peliculas {

    public static $Cantidad;
    public static $TodasLasPeliculas;

    public static function ObtenerTodas() {

      //Me fijo si la lista había sido obtenida previamente, para no hacerlo de nuevo.
      if (!isset(self::$TodasLasPeliculas)) {

        // va a entrar aca la primera vez que llame a obtenerTodas, porque el atributo
        // $TodasLasPeliculas esta vacío.

        //Me conecto a la base de datos
        require_once("connect.php");

        //Ejecuto la lectura
        $CadenaDeBusqueda = "SELECT * FROM movies";
        $ConsultaALaBase = $db->prepare($CadenaDeBusqueda);
        $ConsultaALaBase->execute();

        //Declaro el array de objetos Pelicula
        $PeliculasADevolver=array();

        //Recorro cada registro que obtuve
        while ($UnRegistro = $ConsultaALaBase->fetch(PDO::FETCH_ASSOC)) {

          //Instancio un objeto de tipo Pelicula
          $UnaPeli = new pelicula($UnRegistro['id'],
                                  $UnRegistro['title'],
                                  $UnRegistro['rating'],
                                  $UnRegistro['awards'],
                                  $UnRegistro['length']);


          //Agrego el objeto Pelicula al array
          $PeliculasADevolver[] = $UnaPeli;

        }

        //Guardo las variables globales de la clase de entidad, para no tener que volverlas a llenar
        self::$TodasLasPeliculas = $PeliculasADevolver;

      } else {
        //La lista ya había sido llenada con anterioridad, no la vuelvo a llenar
        // $TodasLasPeliculas tiene contenido, por eso viene por aca

        $PeliculasADevolver = self::$TodasLasPeliculas;
        // utiliza $peliculasADevolver como una vaariable auxiliar
      }

      //Devuelvo el array ya rellenado
      return $PeliculasADevolver;

    }
  }

?>
