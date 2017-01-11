<?php

  class Reviewer extends BaseModel {
    //Attribuutit
    public $id, $nimi, $salasana;
    //Konstruktori
    public function __construct($attributes) {
      parent::__construct($attributes);
    }

    public static function authenticate($nimi, $salasana) {
      $query = DB::connection()->prepare('SELECT * FROM Reviewer WHERE nimi = :nimi AND salasana = :salasana LIMIT 1');
      $query->execute(array('nimi' => $nimi, 'salasana' => $salasana));
      $row = $query->fetch();
      if($row){
        // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
        $reviewer = new Reviewer(array(
          'id' => $row['id'],
          'nimi' => $row['nimi'],
          'salasana' => $row['salasana'],
        ));
        return $reviewer;
      }else{
        return null;
        // Käyttäjää ei löytynyt, palautetaan null
      }
    }

    public static function find($id) {
      $query = DB::connection()->prepare('SELECT * FROM Reviewer WHERE id = :id LIMIT 1');
      $query->execute(array('id' => $id));
      $row = $query->fetch();

      if($row) {
        $reviewer = new Reviewer(array(
          'id' => $row['id'],
          'nimi' => $row['nimi'],
          'salasana' => $row['salasana']
        ));

        return $reviewer;
      }

      return null;
    }
  }
