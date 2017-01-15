<?php

  //Käytä reiteissä toisena parametrinä
  function check_logged_in(){
    BaseController::check_logged_in();
  }

  $routes->get('/', function() {
    MovieController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/movies', function() {
    HelloWorldController::movies();
  });

  $routes->get('/reviews', function() {
    HelloWorldController::reviews();
  });

  $routes->get('/movie', function(){
    MovieController::index();
  });

  $routes->post('/movie', 'check_logged_in', function(){
    MovieController::store();
  });

  $routes->get('/movie/new', 'check_logged_in', function(){
    MovieController::create();
  });

  $routes->get('/movie/:id', function($id){
    MovieController::show($id);
  });

  $routes->get('/movie/:id/edit', 'check_logged_in', function($id){
    MovieController::edit($id);
  });

  $routes->post('/movie/:id/edit', 'check_logged_in', function($id){
    MovieController::update($id);
  });

  $routes->post('/movie/:id/destroy', 'check_logged_in', function($id){
    MovieController::destroy($id);
  });

  $routes->get('/login', function(){
    ReviewerController::login();
  });

  $routes->post('/login', function(){
    ReviewerController::handle_login();
  });

  $routes->post('/logout', function(){
    ReviewerController::logout();
  });
  
  $routes->get('/register', function(){
    ReviewerController::register();
  });
  
  $routes->post('/register', function(){
    ReviewerController::store();
  });
  
  $routes->post('/movie/:id/post_review', 'check_logged_in', function($id){
    ReviewController::store($id);
  });
