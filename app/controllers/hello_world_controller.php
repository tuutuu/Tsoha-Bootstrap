<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'https://github.com/tuutuu/Tsoha-Bootstrap';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä


      //Kint debug

      $leffa = new Movie(array(
        'nimi' => ''
      ));
      $errors = $leffa->errors();

      Kint::dump($errors);
    }

    public static function login(){
      View::make('suunnitelmat/login.html');
    }

    public static function movies(){
      View::make('suunnitelmat/movies.html');
    }

    public static function reviews(){
      View::make('suunnitelmat/reviews.html');
    }
  }
