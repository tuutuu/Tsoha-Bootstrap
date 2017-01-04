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
