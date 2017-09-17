<?php

$listOfBooks = getAllBooks();
$data = [
	'books' => $listOfBooks
];

$content = getContent(
	'../templates/books.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';