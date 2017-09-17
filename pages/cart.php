<?php

use Classes\Cart;
use Classes\Kniha;
use Classes\Objednavky;
use Classes\User;

// 1.krat pride - tak bud je meno prazdne, alebo vyplnit mu ked je prihlaseny
$meno = '';
$adresa = '';
$email = '';
$telefon = '';

// ked je prihlaseny....
$user = new User;
if ($user->isLoggedIn()) {
  $prihlaseny = $user->getLoggedUser();
  $meno = $prihlaseny->meno;
  $adresa = $prihlaseny->adresa;
  $email = $prihlaseny->email;
  $telefon = $prihlaseny->telefon;
}

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
  // tu odoslal (mohol prepisat svoje udaje)
  $meno = htmlentities($_POST['meno']);
  $adresa = htmlentities($_POST['adresa']);
  $email = htmlentities($_POST['email']);
  $telefon = htmlentities($_POST['telefon']);

  // zkontrolovat (zvalidovat) odoslane udaje
  $valid = true;
  if ($valid) {
  	$kosik = Cart::getItems();  	

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

// Create the message
$message = (new Swift_Message())

  // Give the message a subject
  ->setSubject('Your subject')

  // Set the From address with an associative array
  ->setFrom(['john@doe.com' => 'John Doe'])

  // Set the To addresses with an associative array (setTo/setCc/setBcc)
  ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])

  // Give it a body
  ->setBody('Here is the message itself')

  // And optionally an alternative body
  ->addPart('<q>Here is the message itself</q>', 'text/html')

  // Optionally add any attachments
  ->attach(Swift_Attachment::fromPath('my-document.pdf'))
  ;



      $subject = 'Objednavka z eshopu ...';
      $message = 'Dakujeme za objednavku \nMajte sa';
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      mail($email, $subject,
        $message,
        $headers
      );

      // https://github.com/tomaj/EPayment/wiki/Ako-pou%C5%BEiva%C5%A5-PHP

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
  'mnozstvo' => count(Cart::getItems()),
  'meno' => $meno,
  'telefon' => $telefon,
  'email' => $email,
  'adresa' => $adresa
];

$content = getContent(
	'../templates/cart.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';