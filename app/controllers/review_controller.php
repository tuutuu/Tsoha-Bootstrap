<?php

class ReviewController extends BaseController {

    public static function store($id) {
        $params = $_POST;
        $attributes = array(
            'arvostelija_id' => $_SESSION['reviewer'],
            'elokuva_id' => $id,
            'teksti' => $params['teksti'],
            'arvosana' => $params['arvosana']
        );
        $review = new Review($attributes);
        $errors = $review->errors();
        
        if (count($errors) == 0) {
            $review->save();        
            Redirect::to('/movie/' . $id, array('message' => 'Arvostelu lisätty'));
        } else {
            Redirect::to('/movie/'. $id, array('errors' => $errors, 'attributes' => $attributes));
        }
    }
    
    public static function destroy_reviews($elokuva_id) {
        Review::destroy_reviews($elokuva_id);        
    }
}
