<?php

  class Reviewer extends BaseModel {
    //Attribuutit
    public $id, $nimi, $salasana;
    //Konstruktori
    public function __construct($attributes) {
      parent::__construct($attributes);
      $this->validators = array(
          'validate_nimi',
          'validate_salasana'
      );
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
    
    public function save() {
      $query = DB::connection()->prepare('INSERT INTO Reviewer (nimi, salasana) VALUES (:nimi, :salasana) RETURNING id');
      $query->execute(array(
          'nimi' => $this->nimi,
          'salasana' => $this->salasana
      ));
      $row = $query->fetch();
      $this->id = $row['id'];
    }
    
    public function validate_nimi() {
      $errors = array();
      if ($this->nimi == '' || $this->nimi == null) {
        $errors[] = 'Käyttäjänimi puuttuu';
      }
      if (strlen($this->nimi) > 20) {
        $errors[] = 'Liian pitkä nimi (max 20 merkkiä)';
      }
      return $errors;
    }
    
    public function validate_salasana() {
      $errors = array();
      if ($this->salasana == '' || $this->salasana == null) {
        $errors[] = 'Salasana puuttuu';
      }
      if (strlen($this->salasana) > 50) {
        $errors[] = 'Liian pitkä salasana (max 50 merkkiä)';
      }
      return $errors;
    }
  }
