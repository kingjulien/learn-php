<?php

require '../vendor/autoload.php';

session_start();

try {
  // connect to DB
  $db = new PDO(
    'mysql:host=localhost;dbname=eshop2;charset=utf8',
    'root',
    ''
  );
} catch (Exception $e) {
  echo 'Nepodarilo sa pripojit na DB, lebo' . 
    $e->getMessage();
  die();
}

// insert
$query = 'INSERT INTO `products` (`title`, `price`) VALUES ';
for ($i = 1; $i < 200; $i++) {
  $query .= '("Kniha ' . $i .'", ' . rand(1,100) . '),';
}
echo $query;

$db->query( $query );
echo 'ok';


die;

// $lastId = $db->lastInsertId();
// echo 'vlozene id: ' . $lastId;


// update
/*
$db->query('UPDATE `books` SET `title`="Harry Potter 6" WHERE `id`="2"');
die;
*/


// delete
/*
$db->query('DELETE FROM `books` WHERE `id`="5"');
*/



/*
// Execute a prepared statement by passing an array of values
$sql = 'SELECT name, colour, calories
    FROM fruit
    WHERE calories < :calories AND colour = :colour';
$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':calories' => 150, ':colour' => 'red'));
$red = $sth->fetchAll();
$sth->execute(array(':calories' => 175, ':colour' => 'yellow'));
$yellow = $sth->fetchAll();
*/

/*
// Execute a prepared statement by passing an array of values
$sth = $db->prepare(
  'SELECT title, price, description
    FROM books
    WHERE title = :title AND price = :price'
);
$sth->execute(
  array('title' => 'harry potter 6',
  'price' => 22.00)
);

$sth->bindValue(':title', 'harry potter 6', PDO::PARAM_STR);
$sth->bindValue(':price', 22.00, PDO::PARAM_INT);

$harry7 = $sth->fetchAll();
var_dump($harry7);
die;
$sth->execute(array('harry potter 6', 22.00));
$harry6 = $sth->fetchAll();
var_dump($harry6);
die;
*/

/* Execute a prepared statement by binding PHP variables
$calories = 150;
$colour = 'red';
$sth = $dbh->prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories < :calories AND colour = :colour');
$sth->bindValue(':calories', $calories, PDO::PARAM_INT);
$sth->bindValue(':colour', $colour, PDO::PARAM_STR);
$sth->execute();
*/

/*
// Execute a prepared statement by binding PHP variables
$calories = 150;
$colour = 'red';
$sth = $dbh->prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories < ? AND colour = ?');
$sth->bindValue(1, $calories, PDO::PARAM_INT);
$sth->bindValue(2, $colour, PDO::PARAM_STR);
$sth->execute();
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