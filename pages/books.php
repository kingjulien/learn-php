<?php

use Classes\Kniha;

$kniha = new Kniha;
$listOfBooks = $kniha->getBooks();

$data = [
	'books' => $listOfBooks
];

$content = getContent(
	'../templates/books.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';