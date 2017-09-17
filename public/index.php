<?php

require '../vendor/autoload.php';

session_start();

// var_dump($_SESSION);

/*
use Classes\Kniha;

$kniha = new Kniha;
echo $kniha->setTitle('Maly princ');

echo $kniha->getTitle();

die;
*/

// setcookie ('meno', $meno, 1579233353, '/'); //, '', true, true);
// setcookie
/*
$_SESSION['meno'] = 'moje meno';

var_dump($_SESSION['meno']);

die;
*/

// echo session_save_path();

/*
// setcookie ('meno', 'Janko', 9579233353, "/"); //, "" [, bool $secure = false [, bool $httponly = false ]]]]]] )
// setcookie('meno', 'erik');

setcookie('meno', null, -1, '/');

var_dump($_COOKIE);

unset($_SESSION);

var_dump($_SESSION);

die;
*/

use Classes\Router;
use Classes\Cart;

Cart::init();

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

Router::route('GET', '/cart', function($url){
  include '../pages/cart.php';
});

Router::route('POST', '/cart', function($url){
  include '../pages/cart.php';
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
Router::route('GET', '/data/books/(\d+)', function($url){
  include '../pages/data/book.php';
});
Router::route('POST', '/data/books/(\d+)', function($url){
  include '../pages/data/bookSave.php';
});

Router::execute();