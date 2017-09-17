<?php

global $a;
$a = 2;







/**
 * vrati cislo o 2 vacsie ako parameter
 * dsalkdjaslksad
 *
 * @param int $a cislo ktore chceme zvacsit o 2
 * @param string $b cislo ktore chceme zvacsit o 2
 *
 * @return int Returns the number of elements.
 */
function plus2( $a, $funkcia ) {

	$ret = $a + 2;

	call_user_func( $funkcia,
		'nieco', 'ine', 'dalsie'
	);

	return $ret;
}


$vysledok = plus2($a, function ( $a, $b, $c ) {

	echo 'zavolalo ma';
	echo $c;

	return;
});
echo $vysledok;

