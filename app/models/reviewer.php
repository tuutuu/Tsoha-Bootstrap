<?php

  class Reviewer extends BaseModel {
    //Attribuutit
    public $nimi, $salasana;
    //Konstruktori
    public function __construct($attributes) {
      parent::__construct($attributes);
    }
  }
