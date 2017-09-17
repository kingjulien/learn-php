<?php

/*
require '../config/db.php';
require '../helpers/content.php';
require '../classes/Router.php';
*/

require '../classes/Router.php';

// routes
Router::route('GET', '/', function($url){
  include '../pages/home.php';
});

Router::route('GET', '/kontakt', function($url){
  include '../pages/kontakt.php';
});

Router::execute();