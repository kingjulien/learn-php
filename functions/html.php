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
* @param string $podlaCoho - podla coho sa zoraduje,
* napriklad podla 'nazov'
* @return string $query - query string
*/
function zoradQueryString($podlaCoho) {

	// nastavi ?ord na to podla coho zoradujem
	queryBuild('ord', $podlaCoho);

	// nastavi ?sort na bud 'hore' alebo 'dole'
	if (isset($_GET['ord']) && $podlaCoho === $_GET['ord']) {
		// ked zoraduje (klikol) na to iste, tak meni hore/dole

		$sort = (isset($_GET['sort']) && $_GET['sort'] === 'dole') ?
			'hore' : 'dole';
	} else {
		// ked zoraduje (klikol) na ine, tak stale da dole
		$sort = 'dole';
	}

	return queryBuild('sort', $sort);
}


function priceFormat($price) {
/*
  sprintf(
  	"There are %u million bicycles in %s. asdasd %s", $number, $str, $dsa
	);
*/

	return number_format($price,2,","," ");

	setlocale(LC_MONETARY, 'sk_SK');
	return money_format('tu moze byt text %i', $price);
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


/**
* replaces key/value in query string
* @param string $key - key
* @param string $value - value
* @author ja
* @return string $query - query string
*/
function queryBuild($key, $value) {
	$poleHodnot = & $_GET;
	$poleHodnot[$key] = $value;

    return '?' . http_build_query($poleHodnot);
}
