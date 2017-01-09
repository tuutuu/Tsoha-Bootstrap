<?php

class MovieController extends BaseController {
  public static function index(){
    $movies = Movie::all();
    View::make('movie/index.html', array('movies' => $movies));
  }

  public static function store(){
    $params = $_POST;
    $attributes = array(
      'nimi' => $params['nimi']
    );

    $movie = new Movie($attributes);
    $errors = $movie->errors();

    if(count($errors) == 0) {
      $movie->save();
      Redirect::to('/movie/' . $movie->getId(), array('message' => 'Elokuva lisätty'));
    } else {
      View::make('movie/new.html', array('errors' => $errors, 'attributes' => $attributes));
    }
  }

  public static function show($id) {
    $movie = Movie::find($id);
    View::make('movie/show.html', array('movie' => $movie));
  }

  public static function create() {
    View::make('movie/new.html');
  }

  public static function edit($id) {
    $movie = Movie::find($id);
    View::make('movie/edit.html', array('attributes' => $movie));
  }

  public static function update($id) {
    $params = $_POST;

    $attributes = array(
      'id' => $id,
      'nimi' => $params['nimi']
    );

    $movie = new Movie($attributes);
    $errors = $movie->errors();

    if(count($errors) > 0){
      View::make('movie/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      // Kutsutaan alustetun olion update-metodia, joka päivittää elokuvan tiedot tietokannassa
      $movie->update();

      Redirect::to('/movie/' . $movie->getId(), array('message' => 'Elokuvaa muokattu'));
    }
  }

  public static function destroy($id) {
    $movie = new Movie(array('id' => $id));
    $movie->destroy();
    Redirect::to('/movie', array('message' => 'Elokuva poistettu'));
  }
}
