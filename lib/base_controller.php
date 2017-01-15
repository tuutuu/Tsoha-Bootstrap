<?php

  class BaseController{

    public static function get_reviewer_logged_in(){
      // Toteuta kirjautuneen käyttäjän haku tähän
      if(isset($_SESSION['reviewer'])) {
        $id = $_SESSION['reviewer'];
        $reviewer = Reviewer::find($id);
        return $reviewer;
      }
      return null;
    }

    public static function check_logged_in(){
      // Toteuta kirjautumisen tarkistus tähän.
      // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
      if(!isset($_SESSION['reviewer'])) {
        Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));
      }
    }

  }
