<?php

// 1.krat pride - tak je meno prazdne
// po odoslani (POST) - to co zadal do inputu

$meno = isset($_POST['meno']) ? htmlentities($_POST['meno']) : '';
$chyba = '';
$user = new Classes\User;

if (isset($_POST['registruj'])) {
	// chce sa registrovat

	// tu sa zisti ci uz taky je v DB
	$clovek = $user->getUserByEmail($_POST['email']);
	// var_dump($clovek);
	if (!empty($clovek)) {
		$chyba = 'Vami zvoleny email uz u nas evidujeme, prosim zvolte si ine';
	} elseif (
	    // validacia
		empty($_POST['meno'])
		or empty($_POST['email'])
		or empty($_POST['telefon'])
		or empty($_POST['adresa'])
		or empty($_POST['heslo1'])
		or ( strlen($_POST['heslo1']) < 8  )
		or $_POST['heslo1'] !== $_POST['heslo2']
	) {
		// nastala nejaka chyba
		$chyba = 'Nespravne vyplneny formular';

	} else {
		// vsetko je ok, zapis do DB
		$userInfo = array(
			'meno' => $_POST['meno'],
			'priezvisko' => $_POST['priezvisko'],
			'adresa' => $_POST['adresa'],
			'telefon' => $_POST['telefon'],
			'email' => $_POST['email'],
			'login' => $_POST['login'],
			'heslo' => $_POST['heslo1'],
		);
		$user->add($userInfo);
		// chod tam odkial si prisiel
		//header('Location: ' . $_SERVER['HTTP_REFERER']);
		//header('Location: /zaregistroval');
	}

}

$data = [
  'meno' => $meno,
  'chyba' => $chyba
];

$content = getContent(
	'../templates/registracia.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';