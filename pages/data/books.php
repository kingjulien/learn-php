<?php

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');

$listOfBooks = getAllBooks();

echo json_encode($listOfBooks);