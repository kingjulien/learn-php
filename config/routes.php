<?php

use Classes\Router;

// routes
Router::route('GET', '/', function($url){
  include '../pages/homepage.php';
});

Router::route('GET', '/kontakt', function($url){
  include '../pages/kontakt.php';
});

Router::route('GET', '/books/(\d+).*', function($url, $idPage){
  include '../pages/books.php';
});

Router::route('GET', '/books.*', function($url){
  include '../pages/books.php';
});

Router::route('GET', '/book/(.*)/(\d+)', function($url, $slug, $idBook){
  include '../pages/book.php';
});

Router::route('GET', '/cart', function($url){
  include '../pages/cart.php';
});

Router::route('POST', '/cart', function($url){
  include '../pages/cart.php';
});

Router::route('GET', '/registracia', function($url){
  include '../pages/registracia.php';
});

Router::route('POST', '/registracia', function($url){
  include '../pages/registracia.php';
});

Router::route('GET', '/user/objednavky', function($url){
  include '../pages/user/objednavky.php';
});

Router::route('GET', '/user/faktura/(\d+)', function($url, $idFaktury) {
  include '../pages/faktura.php';
});

Router::route('GET', '/user/objednavka/(\d+)', function($url, $idObjednavky) {
  include '../pages/user/objednavka.php';
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
Router::route('POST', '/data/books', function($url){
  include '../pages/data/booksNew.php';
});
Router::route('GET', '/data/books/(\d+)', function($url){
  include '../pages/data/book.php';
});
Router::route('POST', '/data/books/(\d+)', function($url){
  include '../pages/data/bookSave.php';
});

Router::execute();