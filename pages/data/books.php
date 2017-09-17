<?php

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');

$listOfBooks = [];
for ($i=1; $i < 101; $i++) { 
	$listOfBooks[] =
		(object) [
			'id' => $i,
			'title' => 'Pohyblivy sviatok',
			'price' => rand(1, 100),
			'url' => buildBookUrl(
				'Pohyblivy sviatok',
				$i
			)
		]
	;
}

echo json_encode($listOfBooks);