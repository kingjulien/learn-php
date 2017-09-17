<?php

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');


// obrazok, ktory nahrava
var_dump($_FILES);


die;

// cena, title
$price = $_POST['price'];
$title = $_POST['title'];

// validacia vstupu
if (empty($title)) {
	header("HTTP/1.1 400 Bad Request");
	$data = [
	  'errorCode' => 350,
	  'errorMessage' => 'nevyplneny nazov'
    ];
} else {
	// tu sa bude ukladat do DB zmena
	$kniha = new Classes\Kniha;
	$vytvorenaKniha = $kniha->add( $title, $price, '', 1  );

	$data = (object) [
		'id' => $vytvorenaKniha-getId(),
		'title' => $vytvorenaKniha->getTitle(),
		'price' => $vytvorenaKniha->getPrice(),
		'url' => $vytvorenaKniha->getUrl()
	];
}

echo json_encode($data);