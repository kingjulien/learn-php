<?php

include '../templates/header.php';

/*
echo '<pre>';
var_dump($_POST);
echo '</pre>';

echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

$chyby = [];
if ( isset($_POST['odosli'])  ) {
	// tu bol odoslany formular
	if ( !empty($_POST['meno'])
		&& !empty($_POST['sprava'])
	) {
	   $success = 'Dakujeme, sprava bola odoslana';
	} else {
	  // tu nastala nejake chyba
	  if ( empty($_POST['meno']) ) {
	    $chyby[] = 'Prosim vyplnte svoje meno';	
	  }
	  if ( empty($_POST['sprava']) ) {
	    $chyby[] = 'Prosim vyplnte spravu';	
	  }
	}
}

$meno = isset($_POST['meno']) ? htmlentities($_POST['meno']) : '';
$sprava = isset($_POST['sprava']) ? htmlentities($_POST['sprava']) : '';

?>

<?php

if (!empty($chyby)) {
	echo '<ul>';
	foreach ($chyby as $chyba) {
		echo '<li>' . $chyba . '</li>';
	}
	echo '</ul>';
}

?>


Kontaktny formular
<form action="/kontakt.php" method="post">
<p><label>Meno: </label>
	<input type="text" name="meno" value="<?= $meno ?>"  />
</p>
<p>
	<textarea name="sprava" placeholder="Napiste nam spravu">
<?= $sprava ?>
</textarea>
</p>
<input type="submit" value="Send" name="odosli" />
</form>

<?php
include '../templates/footer.php';