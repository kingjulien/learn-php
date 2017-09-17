<?php

if (!isset($_COOKIE['pozeraneKnihy']) || !in_array($idBook, $_COOKIE['pozeraneKnihy'])) {
	$platiDo = time() + 7 * 24 * 3600;
	$namiVytvorenyIndex = 0;
	if (isset($_COOKIE['pozeraneKnihy'])) {
		$namiVytvorenyIndex = count(
			$_COOKIE['pozeraneKnihy']
		);
	}
	setcookie(
		'pozeraneKnihy[' . $namiVytvorenyIndex . ']',
		$idBook,
		$platiDo, 
		'/'
	);
}

$tuMiVratiKnihuGetBookFunkcia = getBook($idBook);

$data = [
  'kniha' => $tuMiVratiKnihuGetBookFunkcia,
  'id' => $idBook,
  'cas' => time()
];
$content = getContent(
	'../templates/book.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';







