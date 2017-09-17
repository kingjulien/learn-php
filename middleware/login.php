<?php

// ci sa niekto prihlasuje / odhlasuje

$user = new Classes\User;

if (isset($_POST['prihlas'])) {
	// chce sa prihlasit
	
	if (
		$user->login($_POST['login'], $_POST['heslo'] )
	) {
		// prihlasenie bolo ok
		header('Location: ' . $_SERVER['REQUEST_URI']);
		die;
	} else {
		// neuspesne prihlasenie
		header('Location: /?loginerror=true');
		die;
	}

} elseif (isset($_POST['odhlas'])) {
	$user->logout();
	header('Location: ' . $_SERVER['REQUEST_URI']);
	die;
}