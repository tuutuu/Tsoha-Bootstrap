<?php

  class Movie extends BaseModel {
    //Attribuutit
    public $id, $nimi;
    //Konstruktori
    public function __construct($attributes) {
      parent::__construct($attributes);
    }

    public static function all() {
      //Tietokantayhteyden alustaminen
      $query = DB::connection()->prepare('SELECT * FROM Movie');

      $query->execute();
      $rows = $query->fetchAll();
      $movies = array();

      foreach($rows as $row) {
        //PHP-syntaksi taulukkoon lisäämiselle
        $movies[] = new Movie(array(
          'id' => $row['id'],
          'nimi' => $row['nimi']
        ));
      }

      return $movies;
    }

    public static function find($id) {
      $query = DB::connection()->prepare('SELECT * FROM Movie WHERE id = :id LIMIT 1');
      $query->execute(array('id' => $id));
      $row = $query->fetch();

      if($row) {
        $movie = new Movie(array(
          'id' => $row['id'],
          'nimi' => $row['nimi']
        ));

        return $movie;
      }

      return null;
    }

    public function save() {
      $query = DB::connection()->prepare('INSERT INTO Movie (nimi) VALUES (:nimi) RETURNING id');
      $query->execute(array('nimi' => $this->nimi));
      $row = $query->fetch();
      $this->id = $row['id'];
    }
  }
