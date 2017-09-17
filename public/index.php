<?php

//require '../config/db.php';
require_once '../functions/content.php';
require_once '../classes/Router.php';
require_once '../functions/html.php';

// routes
Router::route('GET', '/', function($url){
  include '../pages/homepage.php';
});

Router::route('GET', '/kontakt', function($url){
  include '../pages/kontakt.php';
});

Router::route('GET', '/books', function($url){
  include '../pages/books.php';
});

Router::route('GET', '/book/(.*)/(\d+)', function($url, $slug, $idBook){
  include '../pages/book.php';
});

// default error page
Router::route('GET', '/error', function($url){
  include '../pages/error.php';
});

Router::execute();