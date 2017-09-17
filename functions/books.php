<?php

use Classes\Kniha;

function getAllBooks() {
	
	$listOfBooks = [];
	for ($i=1; $i < 101; $i++) {
		$knihaObject = new Kniha(
			$i,
			'knizka moja',
			rand(1, 100)
		);

		$listOfBooks[$i] = $knihaObject;
	}

	return $listOfBooks;	
}

function getBook( $idKnihy ) {
	  // vytiahni z DB 1 knihu
	  // SELECT ....

	  $allBooks = getAllBooks();
	  $oneBook = $allBooks[  $idKnihy  ];

	  return $oneBook;
}
