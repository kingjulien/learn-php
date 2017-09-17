<?php

$filename = '../cache/books.htm';

if (filemtime($filename) > (time() - 0  )) {
	$cachedHtml = file_get_contents($filename);
	echo $cachedHtml;
	exit;
}

use Classes\Kniha;

$limit = 10;
$start = isset($idPage) ? 
   ($idPage - 1) * $limit : 0;
$cena_od = (isset($_GET['cena_od']) ? $_GET['cena_od'] : 0); 
$cena_do = (isset($_GET['cena_do']) && !empty($_GET['cena_do']) ? $_GET['cena_do'] : NULL);
$hladaj = (isset($_GET['hladaj']) && !empty($_GET['hladaj']) ? $_GET['hladaj'] : NULL);
// zoradovanie
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

// filtrovanie, napr. podla ceny_od, ceny_do
$kniha = new Kniha;
$listOfBooks = $kniha->getBooks(
	$start, $limit, $orderBy, $cena_od, $cena_do, $hladaj
);
$pocetKnih = $kniha->count;

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
ob_start();
include '../templates/layout.php';
$html = ob_get_contents();
ob_end_clean();

file_put_contents('../cache/books.htm', $html);

echo $html;