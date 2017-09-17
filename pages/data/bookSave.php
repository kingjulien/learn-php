<?php

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');

$id = $_POST['id'];
$price = $_POST['price'];
$title = $_POST['title'];

// validacia vstupu


// tu sa bude ukladat do DB zmena


$data = (object) [
	'id' => $id,
	'title' => $title,
	'price' => $price,
	'url' => buildBookUrl(
		$title,
		$id
	)
];

echo json_encode($data);