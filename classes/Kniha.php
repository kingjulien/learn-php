<?php namespace Classes;

class Kniha extends Product {

	protected $pocetStran;

	public function __construct(
		$id = 0, $title = '', $price = 0
	) {
	  
		$title = 'Kniha ' . $title;

	  parent::__construct($id, $title, $price);


	}

	public function setPocetStran($pocetStran) {
		$this->pocetStran = $pocetStran;
	}

	public function getFirstWordOfTitle() {
		
		$firstWord = explode(' ', $this->title)[0];

		return $firstWord;
	}

	public function getById( $idKnihy ) {
	  // vytiahni z DB 1 knihu
	  // SELECT ....

	  $allBooks = getAllBooks();
	  $oneBook = $allBooks[  $idKnihy  ];

	  return $oneBook;
	}
}