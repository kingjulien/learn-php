<?php

use Classes\Kniha;

function getBook( $idKnihy ) {
	  // vytiahni z DB 1 knihu
	  // SELECT ....

	  $allBooks = getAllBooks();
	  $oneBook = $allBooks[  $idKnihy  ];

	  return $oneBook;
}
