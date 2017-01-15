<?php

  class ReviewerController extends BaseController{

    public static function store() {
        $params = $_POST;
        $attributes = array(
            'nimi' => $params['nimi'],
            'salasana' => $params['salasana']
        );
        $reviewer = new Reviewer($attributes);
        $errors = $reviewer->errors();
       
        if (count($errors) == 0) {
            $reviewer->save();        
            Redirect::to('/login', array('message' => 'Rekisteröidyit onnistuneesti, ' . $params['nimi'], 'nimi' => $params['nimi']));
        } else {
            Redirect::to('/register', array('errors' => $errors, 'attributes' => $attributes));
        }
    } 
      
    public static function login() {
      View::make('reviewer/login.html');
    }    

    public static function handle_login() {
      $params = $_POST;
      $reviewer = Reviewer::authenticate($params['nimi'], $params['salasana']);
      if(!$reviewer) {
        View::make('reviewer/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana', 'nimi' => $params['nimi']));
      } else {
        $_SESSION['reviewer'] = $reviewer->id;
        $_SESSION['username'] = $reviewer->nimi;

        Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $_SESSION['username']));
      }
    }

    public static function logout(){
      $_SESSION['reviewer'] = null;
      Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
    }
    
    public static function register() {
        View::make('reviewer/register.html');
    }
  }
