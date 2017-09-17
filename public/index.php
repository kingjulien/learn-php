<?php

require '../vendor/autoload.php';

session_start();

// var_dump($_SESSION);

global $db;

// require 'db.php';
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

$user = new Classes\User;
// kontrola ci pre user stranky je prihlaseny ako user
if (preg_match('/user/', $_SERVER['REQUEST_URI'])) {
 if (!$user->isLoggedIn()) {
  header('Location: /registration');
  die;
 }
}

// kontrola ci pre user stranky je prihlaseny ako user
if (preg_match('/admin/', $_SERVER['REQUEST_URI'])) {
 
}

require '../middleware/login.php'; // musi byt az po session_start()

use Classes\Cart;

Cart::init();

require '../config/routes.php';