<?php
// Esta sería la clase entidad
  class pelicula {
    private $id;
    private $tittle;
    private $rating;
    private $awards;
    private $length;


    public function __construct($id, $titulo, $rating, $awards, $length) {

      $this->id=$id;
      $this->tittle=$titulo;
      $this->rating=$rating;
      $this->awards=$awards;
      $this->length=$length;

    }

    public function getId() {
      return $this->id;
    }

    public function getTitulo(){
        return $this->tittle;
    }

  }

?>
