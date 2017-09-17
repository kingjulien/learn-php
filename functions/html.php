<?php

/**
* creates valid url slug
* @param string $title - title
* @return string $slug - valid url slug
*/
function slug(string $title) {

	$slug = preg_replace('/[^\w]/', '-', $title);
    $slug = strtolower(preg_replace('/(-+)/', '-', $slug));

	return $slug;
}



/**
* creates url slug
* @param string $title - title
* @param int $id - id of one book
* @return string $url - url of one book
*/
function buildBookUrl(string $title, int $id) {

	$url = '/book/' . slug($title)
	 . '/' . $id;

	return $url;
}
