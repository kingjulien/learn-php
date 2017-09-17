<?php namespace Classes;

abstract class Product {

	protected $id;
	protected $title;
	protected $price;
	protected $description;

	public function __construct(
		$id = 0, $title = '', $price = 0
	) {
		$this->price = $price;
		$this->title = $title;
		$this->id = $id;

		$this->buildUrl();

		// dalsie operacie pri vytvarani noveho objektu cez new
	}


	public function setPrice(int $price) {
	
		$this->price = $price;
	}

	public function setId(int $id) {
	
		$this->id = $id;

		$this->url = buildUrl();
	}

	public function __toString() {
		return $this->title;
	} 

	protected function buildUrl() {
		$this->url = buildBookUrl($this->title, $this->id);
	}

	public function setTitle(string $title) {
		// tu nieco este viem robit s titlom, keby som chcel,
		// napr. max. dlzku, ...
		
		// $title = substr(string, start)


		$this->title = $title;

		$this->buildUrl();
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
		
		return $this->url;
	}

	public function getId() {
		
		return $this->id;
	}

}