<?php

require '../vendor/autoload.php';

session_start();

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

require '../middleware/login.php'; // musi byt az po session_start()

use Classes\Cart;

Cart::init();

require '../config/routes.php';