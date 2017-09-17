<?php

use Classes\Cart;
use Classes\Kniha;

// vkladanie do kosika
if (isset($_POST['vlozKnihy'])) {
  // var_dump($_POST);

  foreach ($_POST['doKosika'] as $idKnihy) {
  	// $kniha = new Kniha;
  	$vlozenaKniha = getBook($idKnihy);

  	Cart::addToCart($vlozenaKniha);
  }
  
}

// vytiahne z kosika a posli do template
$data = [
  'knihyVKosiku' => Cart::getItems()
];

$content = getContent(
	'../templates/cart.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';