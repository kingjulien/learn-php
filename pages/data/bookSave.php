<?php

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');

parse_str(file_get_contents("php://input"), $put);
foreach ($put as $key => $value)
{
	unset($put[$key]);

	$put[str_replace('amp;', '', $key)] = $value;
}

$price = $put['price'];
$title = $put['title'];

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