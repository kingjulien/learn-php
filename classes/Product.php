<?php namespace Classes;

abstract class Product {

    protected $db;
	protected $id;
	protected $title;
	protected $price;
	protected $description;

	public function __construct() {
      global $db;
      $this->db = $db;
    }
    
	public function setPrice(int $price) {
	
		$this->price = $price;
	}

	public function setId(int $id) {
	
		$this->id = $id;
	}

	public function __toString() {
		return $this->title;
	} 

	protected function buildUrl() {    
      return buildBookUrl($this->title, $this->id);
	}

	public function setTitle(string $title) {
		// tu nieco este viem robit s titlom, keby som chcel,
		// napr. max. dlzku, ...
		
		// $title = substr(string, start)


		$this->title = $title;

		return $this;
	}

	public function getTitle() {
		
		return $this->title;
	}

	public function getPrice() {
		
		return $this->price;
	}

    public function getDescription() {
		
		return $this->description;
	}

	public function getUrl() {

		return $this->buildUrl();
	}

	public function getId() {
		
		return $this->id;
	}


	

}