<?php

/****************************************************************************************************************************

Prerequisites

1. to public/index.php

Router::route('GET', '/books/(\d+)', function($url, $idPage){
  include '../pages/books.php';
});


2. to pages/books.php

$data = [
	'books' => getAllBooks(),
	'idPage'=> $idPage,	
];


3. add functions/pagination.php to composer.json autoload

4. call this function in templates/books.php e.g.  pagination( 'books', $books, 10, $idPage );

5. it is needed to edit getAllBooks() for loop of smaller amount of items according to $itemsPerPage and $idPage


*****************************************************************************************************************************/



/**
 * pagination of pages
 *
 * @param string $slug  - slug of items 
 * @param object $products - all products 
 * @param integer $itemsPerPage  - how many items per page
 * @param integer $idPage - id active page 
 *
 * @return string $pagination - unordered list  
 *
 */

  function pagination( $slug, $count, $itemsPerPage = 10, $idPage ) {

    $li = ceil( $count / $itemsPerPage );

    $pagination  = '<ul class="pagination">';

    for($p = 1; $p <= $li; $p++) {
        $pagination .= '<li ';
        $pagination .=  ( $idPage == $p )   ? ' class="active" ' : '';
        $pagination .= ' ><a href="/' . $slug. '/' . $p . '?' . http_build_query($_GET) .  '">' . $p . '</a></li>';
    };
    
    $pagination .= '</ul>';


    return $pagination;

 }





?>