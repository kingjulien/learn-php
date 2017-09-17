<?php
// objednavky usera prihlaseneho

use Classes\User;
use Classes\Objednavky;

$user = new User;

$objednavky = new Objednavky;
$objednavkyPrihlaseneho = $objednavky->getByUserId(
	$user->getLoggedUser()->id
);

$data = [
  'objednavky' => $objednavkyPrihlaseneho,
];
$content = getContent(
	'../templates/user/objednavky.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';







