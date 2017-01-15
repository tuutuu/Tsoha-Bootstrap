<?php

  class Review extends BaseModel {
    //Attribuutit
    public $arvostelija_id, $elokuva_id, $teksti, $arvosana;
    //Konstruktori
    public function __construct($attributes) {
      parent::__construct($attributes);
    }
    
    public function save() {
      //Todo Review save
      $query = DB::connection()->prepare('INSERT INTO Review (arvostelija_id, elokuva_id, teksti, arvosana) VALUES (:arvostelija_id, :elokuva_id, :teksti, :arvosana)');
      $query->execute(array(
          'arvostelija_id' => $this->arvostelija_id,
          'elokuva_id' => $this->elokuva_id,
          'teksti' => $this->teksti,
          'arvosana' => $this->arvosana
      ));
    }
    
    public static function find_reviews($id) {
      //Tietokantayhteyden alustaminen
      $query = DB::connection()->prepare('SELECT * FROM Review WHERE elokuva_id = :id');

      $query->execute(array('id' => $id));
      $rows = $query->fetchAll();
      $reviews = array();
      $reviewer = null;
      
      foreach($rows as $row) {
        //käyttäjänimen hakeminen show-näkymää varten
        $reviewer = Reviewer::find($row['arvostelija_id']);
        //PHP-syntaksi taulukkoon lisäämiselle
        $reviews[] = array(
          'arvostelija_id' => $row['arvostelija_id'],
          'elokuva_id' => $row['elokuva_id'],
          'teksti' => $row['teksti'],
          'arvosana' => $row['arvosana'],
          //käyttäjänimi
          'arvostelija_nimi' => $reviewer->nimi
        );
      }

      return $reviews;
    }
    
    public function destroy_reviews($elokuva_id) {
      $query = DB::connection()->prepare('DELETE FROM Review WHERE elokuva_id=:elokuva_id');
      $query->execute(array('elokuva_id' => $elokuva_id));
    }
  }
