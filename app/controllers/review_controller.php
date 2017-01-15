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
        
        //todo validation
        
        $review->save();
        
        Redirect::to('/movie/' . $review->elokuva_id, array('message' => 'Arvostelu lisätty'));
    }
    
    public static function destroy_reviews($elokuva_id) {
        Review::destroy_reviews($elokuva_id);        
    }
}
