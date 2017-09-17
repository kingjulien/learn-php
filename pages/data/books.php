<?php

// REST - books

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');

$kniha = new Classes\Kniha;
$listOfBooks = $kniha->getBooks();

$data = [];
// transformacia na data
foreach ($listOfBooks as $book) {
	$data[] = (object) [
		'id' => $book->getId(),
		'title' => $book->getTitle(),
		'price' => $book->getPrice(),
		'description' => $book->getDescription(),
		'autor_meno' => $book->autor_meno,
		'autor_narodenie' => $book->autor_narodenie,
		'autor_popis' => $book->autor_popis,
	];
}

echo json_encode($data);