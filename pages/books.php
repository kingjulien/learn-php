<?php

// require 'data/books.php';

// $listOfBooks = getBooks();

$listOfBooks = [];
for ($i=1; $i < 101; $i++) { 
	$listOfBooks[] =
		(object) [
			'id' => $i,
			'title' => 'Pohyblivy sviatok',
			'price' => rand(1, 100),
			'url' => buildBookUrl(
				'Pohyblivy sviatok',
				$i
			)
		]
	;
}
$data = [
	'books' => $listOfBooks
];

$content = getContent(
	'../templates/books.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';