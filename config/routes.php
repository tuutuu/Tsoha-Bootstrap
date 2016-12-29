<?php

  $routes->get('/', function() {
    HelloWorldController::index();
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
