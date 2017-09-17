<?php

use Classes\Kniha;

$start = 0; // toto sa bude menit podla $_GET['page']
$limit = 10;

if (isset($_GET['ord'])) {
	$getOrd = $_GET['ord'];
	$orderingMap = [
	   'cena' => 'price',
	   'nazov' => 'title',
	];

	$orderBy = (
		  array_key_exists($getOrd, $orderingMap) ?
		  $orderingMap[$getOrd] :
		  'RAND()'
	);

    // ORDER BY title ASC / DESC
	$orderBy .= (isset($_GET['sort']) && $_GET['sort'] === 'dole')
			 ? ' DESC' : ' ASC';

} else {
	$orderBy = 'RAND()';
}

$kniha = new Kniha;
$listOfBooks = $kniha->getBooks($start, $limit, $orderBy);

$pocetKnih = $kniha->getCount();

$data = [
	'books' => $listOfBooks,
	'pocetKnih' => $pocetKnih,
     'itemsPerPage' => $limit,
     'idPage' => isset($idPage) ? $idPage : 1
];

$content = getContent(
	'../templates/books.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';