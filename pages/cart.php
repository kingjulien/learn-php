<?php

use Classes\Cart;
use Classes\Kniha;

// vkladanie do kosika
if (isset($_POST['vlozKnihy'])) {
  // var_dump($_POST);

  if (isset($_POST['doKosika'])) {
	  foreach ($_POST['doKosika'] as $idKnihy) {
	  	// $kniha = new Kniha;
	  	$vlozenaKniha = getBook($idKnihy);

	  	try {
	  	  Cart::addToCart($vlozenaKniha);
	  	  // code dalsi
	  	  //

	  	} catch (\Exception $exception) {
	  		var_dump($exception->getMessage());
	  		die;

	  	}

	  }
  }
}

// mazanie z kosika
if (isset($_POST['zmazat'])) {
  // var_dump($_POST);
  if (isset($_POST['zKosika'])) {
	  foreach ($_POST['zKosika'] as $idKnihy) {
	  	Cart::removeFromCart($idKnihy);
	  }
	}
}

// objednava sa
if (isset($_POST['objednat'])) {
  // zapise objednavku do DB
  // mail poslat clovek cloveku

}

// vytiahne z kosika a posli do template
$data = [
  'knihyVKosiku' => Cart::getItems(),
  'suma' => Cart::getSum(),
  'mnozstvo' => count(Cart::getItems())
];

$content = getContent(
	'../templates/cart.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';