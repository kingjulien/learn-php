<?php namespace Classes;

class Kniha extends Product {

	const TABLE_NAME = 'products';

	protected $pocetStran;

	public function __construct(
		$id = 0, $title = '', $price = 0
	) {
	  
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

	public function getBooks($limit = 10) {
		global $db;

        // $this->db

		// odkial $db ziskame ?
		$sth = $db->prepare(
		  'SELECT title, price, description
		    FROM ' . self::TABLE_NAME
		   . ' LIMIT ' . $limit
		);
		$sth->execute();
	
		// random

		$books = [];
        while ($book = $sth->fetchObject('Classes\Kniha')) {
          $books[] = $book;
          var_dump($book); die;
        }
        // $books = $sth->fetchAll(\PDO::FETCH_CLASS, 'Classes\Kniha');
       
        var_dump($books);


		// $this->books = 
		return $books;
	}
}