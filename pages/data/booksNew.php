<?php

header('Content-Type: text/json');
header('Access-Control-Allow-Origin: *');

// tu validacia dat, napr. nazov nemoze byt prazdny


// tu uloz do DB (aby ziskalo idKnihy)
$kniha = new Classes\Kniha;
$nazov = $_POST['title_nova'];
$cena = $_POST['price_nova'];
$popis = $_POST['description_nova'];
$authorId = $_POST['author_nova'];

$vytvorenaKniha = $kniha->add( $nazov, $cena, $popis, $authorId );
$idKnihy = $vytvorenaKniha->getId();

// obrazok, ktory nahrava
// You should name it uniquely.
// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
// On this example, obtain safe unique name from its binary data.

$adresar = __DIR__ . '/../../public/fotky/' . $idKnihy;
mkdir($adresar, 0744);

// tu este osetrovacky ci je to vobec obrazok a velkost a pod....

if (!empty($_FILES['obrazok']['tmp_name'][0])) {
	foreach ($_FILES['obrazok']['tmp_name'] as $tmpName) {
		if (
			!move_uploaded_file(
				$tmpName,
				sprintf('%s/%s', $adresar, sha1_file($tmpName))
			)
		) {
		    throw new RuntimeException('Failed to move uploaded file.');
		}
	}
}

$data = (object) [
	'id' => $vytvorenaKniha->getId(),
	'title' => $vytvorenaKniha->getTitle(),
	'price' => $vytvorenaKniha->getPrice(),
	'url' => $vytvorenaKniha->getUrl()
];

echo json_encode($data);