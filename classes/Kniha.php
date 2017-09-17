<?php namespace Classes;

class Kniha extends Product {

	const TABLE_NAME = 'products';

	protected $pocetStran;
	protected $excerpt;
	public $autor_meno;
	public $autor_narodenie;
	public $autor_popis;

	public $count;

	public function getImageUrl($idKnihy) {
		
		$cesta = __DIR__ . '/../public/fotky/' . $idKnihy;

		$obrazky = [];
			
		if (is_dir($cesta)) {
			$adresar = opendir($cesta);
		    while (  (  $file = readdir($adresar)   ) !== false) {
			      if ($file !== '.' && $file !== '..') {
			      		$obrazky[] = $file;
			      }
		    }
	    closedir($adresar);
	  }

		return '/fotky/' . $idKnihy . '/' . $obrazky[0];
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
		$from = 0, $limit = 10, $orderBy = 'RAND()',
		$cena_od = 0, $cena_do = NULL, $hladaj = NULL
	) {
		$this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);

		$whereSql = 'price >= :cena_od AND price <= :cena_do';
		$whereHodnoty = [
			'cena_od' => $cena_od,
			'cena_do' => ($cena_do === NULL) ? '9999999' : $cena_do
		]; // 999999 sa ma nahradit getMaxPrice()

		if ($hladaj !== NULL) {
			$whereSql .= ' AND MATCH(title,description) AGAINST (:hladaj)';
			$whereHodnoty['hladaj'] = $hladaj;
		}

		$sth = $this->db->prepare(
		  'SELECT ' . self::TABLE_NAME . '.id, title, price, description,
		  	authors.meno as autor_meno,
		  	authors.narodenie as autor_narodenie,
		  	authors.popis as autor_popis,
		  	authors.id as authorId
		    FROM ' . self::TABLE_NAME
		    . ' JOIN authors ON  ' . self::TABLE_NAME . '.authorId = authors.id'
		    . ' WHERE ' . $whereSql
		    . ' ORDER BY ' . $orderBy 
		   . ' LIMIT ' . $from . ',' .  $limit
		);
		if (!$sth) {
			print_r($this->db->errorInfo());
			die;
		}
		$sth->execute(
			$whereHodnoty
		);

		$books = [];
        while ($book = $sth->fetchObject(__CLASS__)) {
          $books[] = $book;
        }
        // $books = $sth->fetchAll(\PDO::FETCH_CLASS, 'Classes\Kniha');
       
		$this->count = $this->getCount($whereSql, $whereHodnoty);

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

	public function getCount($where, $whereHodnoty) {
		// toto presunut inam
		// $this->count = 

		$sth = $this->db->prepare(
		  'SELECT COUNT(*) as pocet FROM ' . self::TABLE_NAME .
		  ' WHERE ' . $where
		);
		$sth->execute( $whereHodnoty );

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


	public function edit( $id, $nazov, $cena, $popis, $authorId  ) {
        
        $sql = 'UPDATE `products` SET title = :title,
                description = :description,
                price = :price,
                authorId = :authorId
                WHERE id = :id
        ';

		$this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);

        $query = $this->db->prepare($sql);
        if (!$query) {
			print_r($this->db->errorInfo());
			return false;
		}
        $query->execute(array(
            ':id' => $id,
            ':title' => $nazov,
            ':description' => $popis,
            ':price' => $cena,
            ':authorId' => $authorId
        ));

        

        return true;
    }


    public function add( $nazov, $cena, $popis, $authorId ) {
        
        $sql = 'INSERT INTO `products`
        		(title, description, price, authorId)
        		VALUES (:title, :description, :price, :authorId)
        ';

		$this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);

        $query = $this->db->prepare($sql);
        if (!$query) {
			print_r($this->db->errorInfo());
			return false;
		}
        $query->execute(array(
            ':title' => $nazov,
            ':description' => $popis,
            ':price' => $cena,
            ':authorId' => $authorId
        ));

        $idVytvorenejKnihy = $this->db->lastInsertId();

        $vytvorenaKniha = $this->getById($idVytvorenejKnihy);

        return $vytvorenaKniha;
    }
}