<?php

// header('Content-Type: text/json');

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


// admin pages
Router::route('GET', '/admin/books', function($url){
  include '../pages/admin/books.php';
});


// data
Router::route('GET', '/data/books', function($url){
  include '../pages/data/books.php';
});

Router::execute();