<?php

class MovieController extends BaseController {
  public static function index(){
    $movies = Movie::all();
    View::make('movie/index.html', array('movies' => $movies));
  }

  public static function store(){
    $params = $_POST;
    $movie = new Movie(array(
      'nimi' => $params['nimi']
    ));

    Kint::dump($params);

    $movie->save();

    //Redirect::to('/movie/' . $movie->id, array('message' => 'Elokuva lisätty'));
  }

  public static function create() {
    View::make('movie/new.html');
  }
}
