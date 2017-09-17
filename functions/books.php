<?php


function getAllBooks() {
	
	$listOfBooks = [];
	for ($i=1; $i < 101; $i++) {
		$listOfBooks[$i] =
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

	return $listOfBooks;	
}


function getBook( $idKnihy ) {
  // vytiahni z DB 1 knihu
  // SELECT ....

  $allBooks = getAllBooks();
  $oneBook = $allBooks[  $idKnihy  ];

  return $oneBook;
}