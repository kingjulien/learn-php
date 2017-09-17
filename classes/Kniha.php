<?php namespace Classes;

class Kniha extends Product {

	const TABLE_NAME = 'products';

	protected $pocetStran;
	protected $excerpt;

	public function setPocetStran($pocetStran) {
		$this->pocetStran = $pocetStran;
	}

	public function getFirstWordOfTitle() {
		
		$firstWord = explode(' ', $this->title)[0];

		return $firstWord;
	}

	public function getById( $idKnihy ) {
	  // vytiahni z DB 1 knihu
	  $sth = $this->db->prepare(
		'SELECT id, title, price, description
		    FROM ' . self::TABLE_NAME
		   . ' WHERE `id` = :id LIMIT 1'
	  );
	  $sth->execute(['id' => $idKnihy]);

	  $oneBook = $sth->fetchObject(__CLASS__);

	  return $oneBook;
	}

	public function getBooks(
		$from = 0, $limit = 10, $orderBy = 'RAND()'
	) {
		$sth = $this->db->prepare(
		  'SELECT id,title, price, description
		    FROM ' . self::TABLE_NAME
		    . ' ORDER BY ' . $orderBy 
		   . ' LIMIT ' . $from . ',' .  $limit
		);
		$sth->execute();

		$books = [];
        while ($book = $sth->fetchObject(__CLASS__)) {
          $books[] = $book;
        }
        // $books = $sth->fetchAll(\PDO::FETCH_CLASS, 'Classes\Kniha');
       
		// $this->books = 
		return $books;
	}


	public function getByIds(array $ids) {
		$sth = $this->db->prepare(
		  'SELECT id,title, price, description
		    FROM ' . self::TABLE_NAME
		   . ' WHERE id IN(' . implode(',', $ids) .  ')'
		);
		$sth->execute();
	
		$books = [];
        while ($book = $sth->fetchObject(__CLASS__)) {
          $books[] = $book;
        }

		return $books;
	}

	public function getCount() {
		// toto presunut inam

		$sth = $this->db->prepare(
		  'SELECT COUNT(*) as pocet FROM ' . self::TABLE_NAME
		);
		$sth->execute();

		$result = $sth->fetchAll();

		return $result[0]['pocet'];
	}


	public function __sleep() {
		return [
			'id',
			'title',
			'description',
			'price',
			'excerpt',
			'pocetStran'
		];
	}
}