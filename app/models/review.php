<?php

  class Review extends BaseModel {
    //Attribuutit
    public $arvostelija, $elokuva, $teksti, $arvosana, $updownvotes;
    //Konstruktori
    public function __construct($attributes) {
      parent::__construct($attributes);
    }
  }
