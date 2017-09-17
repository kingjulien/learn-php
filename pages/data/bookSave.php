<?php

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');

$id = $_POST['id'];
$price = $_POST['price'];
$title = $_POST['title'];

// validacia vstupu
if (!is_numeric($id)) {
	header("HTTP/1.1 400 Bad Request");
	$data = [
	  'errorCode' => 350,
	  'errorMessage' => 'nevyplnene id'
    ];
} else {
	// tu sa bude ukladat do DB zmena
	$kniha = new Classes\Kniha;

	$kniha->edit( $id, $title, $price, '', 1  );


	$data = (object) [
		'id' => $id,
		'title' => $title,
		'price' => $price,
		'url' => buildBookUrl(
			$title,
			$id
		)
	];
}

echo json_encode($data);