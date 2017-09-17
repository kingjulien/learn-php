<?php

/*
require_once '../data/articles.php';
require_once '../data/books.php';

// get 2 articles for homepage
$articles = getArticles( 2 );

$books = getRandomBooks();

$data = [
	'articles' => $articles,
	'books' => $books
];


// get content
// 2 clanky
$clankyTemplate = getContent('../templates/home.php', $data);
// 5 nahodnych knih
$knihyTemplate = getContent('../templates/books.php', $data);

$content = $clankyTemplate . $knihyTemplate;

*/

$zoznamClankov = [1, 3, 4];
$data = [
	'zoznamClankov' => $zoznamClankov,
];

$content = getContent(
	'../templates/homepage.php',
	$data
);

// html vystup - layout (view)
include '../templates/layout.php';