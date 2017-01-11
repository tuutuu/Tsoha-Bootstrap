<?php

  class ReviewerController extends BaseController{

    public static function foobar() {
      echo 'Do nothing';
    }

    public static function login() {
      View::make('reviewer/login.html');
    }

    public static function handle_login() {
      $params = $_POST;
      $reviewer = Reviewer::authenticate($params['nimi'], $params['salasana']);
      //if(!$reviewer) {
      //  View::make('reviewer/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana', 'nimi' => $params['nimi']));
      //} else {
        $_SESSION['reviewer'] = $reviewer->id;

        Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $reviewer->nimi));
      //}
    }

    public static function logout(){
      $_SESSION['reviewer'] = null;
      Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }
  }
