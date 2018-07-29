<?php
// Esta sería la clase entidad
  class pelicula {
    private $id;
    private $tittle;
    private $rating;
    private $awards;
    private $length;
    private $genreId;


    public function __construct($id, $titulo, $rating, $awards, $length, $genreId) {

      $this->id=$id;
      $this->title=$titulo;
      $this->rating=$rating;
      $this->awards=$awards;
      $this->length=$length;
      $this->genreId=$genreId;
    }

    public function getId() {
      return $this->id;
    }

    public function getTitulo(){
        return $this->title;
    }

    public function getRating(){
        return $this->rating;
    }
    public function getAwards(){
        return $this->awards;
    }
    public function getDuracion(){
        return $this->length;
    }

    public function guardar(){
      require("..\db\connect.php");
      $sql = "INSERT INTO movies_db.movies (created_at,
                                            updated_at,
                                            title,
                                            rating,
                                            awards,
                                            length,
                                            genre_id)
              VALUES (NOW(),
                      NOW(),
                      '{$this->title}',
                      '{$this->rating}',
                      '{$this->awards}',
                      '{$this->length}',
                      '{$this->genreId}')";

      $query= $db->prepare($sql);
      $query-> execute();
      $db= null;

    }

    public function modificar(){
      require("..\db\connect.php");

      $sql = "UPDATE movies_db.movies SET title    = '{$this->title}',
                                          rating   = '{$this->rating}',
                                          awards   = '{$this->awards}',
                                          length   = '{$this->length}',
                                          genre_id = '{$this->genreId}'
                                          WHERE id = '{$this->id}'";

      $query= $db->prepare($sql);
      $query-> execute();
      $db= null;
    }

    public function eliminar(){
      require("..\db\connect.php");
      $sql = "DELETE FROM movies_db.movies WHERE id ='{$this->id}'";

      $query= $db->prepare($sql);
      $query-> execute();
      $db= null;
    }
  }
?>
