<?php
// objednavka podla id

/*
use Classes\Objednavky;
use Classes\User;
*/

use Classes\{ User, Objednavky };

$objednavky = new Objednavky;
$objednavka = $objednavky->getObjednavkaById(
	$idObjednavky
);

$user = new User;
$prihlasenyUser = $user->getLoggedUser();
// ci objednavka patri userovi
if ($objednavka['userId'] !== $prihlasenyUser->id) {
	$objednavka = [];
}

$data = [
  'objednavka' => $objednavka,
];

$content = getContent(
	'../templates/user/objednavka.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';







