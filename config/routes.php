<?php

  $routes->get('/', function() {
    MovieController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/login', function() {
    HelloWorldController::login();
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

  $routes->post('/movie', function(){
    MovieController::store();
  });

  $routes->get('/movie/new', function(){
    MovieController::create();
  });

  $routes->get('/movie/:id', function($id){
    MovieController::show($id);
  });

  $routes->get('/movie/:id/edit', function($id){
    MovieController::edit($id);
  });

  $routes->post('/movie/:id/edit', function($id){
    MovieController::update($id);
  });

  $routes->post('/movie/:id/destroy', function($id){
    MovieController::destroy($id);
  });

  $routes->get('/login', function(){
    UserController::login();
  });

  $routes->post('/login', function(){
    UserController::handle_login();
  });
