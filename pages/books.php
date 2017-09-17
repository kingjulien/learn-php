<?php

use Classes\Kniha;

$start = 0; // toto sa bude menit podla $_GET['page']
$limit = 15;

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

} else {
	$orderBy = 'RAND()';
}

$kniha = new Kniha;
$listOfBooks = $kniha->getBooks($start, $limit, $orderBy);

$data = [
	'books' => $listOfBooks
];

$content = getContent(
	'../templates/books.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';