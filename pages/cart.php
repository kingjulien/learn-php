<?php

use Classes\Cart;
use Classes\Kniha;
use Classes\Objednavky;


// 1.krat pride - tak bud je meno prazdne, alebo vyplnit mu ked je prihlaseny
// po odoslani (POST) - to co zadal do inputu

// vkladanie do kosika
if (isset($_POST['vlozKnihy'])) {
  // var_dump($_POST);

  if (isset($_POST['doKosika'])) {
  	  $kniha = new Kniha;
      $knihyKtoreChceDatDoKosika = $kniha->getByIds($_POST['doKosika']);

	  foreach ($knihyKtoreChceDatDoKosika as $vlozenaKniha) {
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
  // zkontrolovat (zvalidovat) odoslane udaje

  $valid = true;
  if ($valid) {
  	$kosik = Cart::getItems();
  	$meno = $_POST['meno'];
  	$adresa = $_POST['adresa'];
  	$email = $_POST['email'];
  	$telefon = $_POST['telefon'];

    // zapise objednavku do DB
    $objednavka = new Objednavky;

    if (
    	$objednavka->add(
    		$kosik,
    		$meno,
    		$adresa,
    		$email,
    		$telefon
  	  )
    ) {
      Cart::clearCart();
      // mail poslat clovek cloveku
      header('Location: /kupil');
      die;
    } else {
      // nedokoncila sa objednavka z nejakeho dovodu, chyba

    }

    
  }



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