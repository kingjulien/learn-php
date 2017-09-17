<!DOCTYPE html>
<html>
  <head>
    <title>PHP!</title>
  </head>
  <body>
	<?php


	include('./2.txt');
	include_once('./2.txt');

	require('./2.txt');
	require_once('./2.txt');

	// uhadnite prislovie (dovtedy sa chodi s krcahom pre vodu, pokial sa nerozbije)
	while ( $mugIsNotBroken() ) {
		goForWater();
	}


	// Tasks
	// vypiste cisla od 1 po 100, potom od 20 po 50, potom kazde parne, potom delitelne 3



	// napiste nekonecny cyklus (2 roznymi sposobmi)
	while (true) {
		// do something

	}
	for ($a = 0; $a != 1; ) {
		// do something
	}
?>


	<table class="table table-striped">
		<thead>
		<tr><th>Den</th><th>Jedlo</th><th>Cena</th><th>Sefkuchar</th>
				<th>Bezlepkove</th>
		</tr>
		</thead>

		<?php
/*
		$kamarati = [
			'Janko',
			'Jozko',
			'Ferko',
			'Durko',
			'Anicka',
			'Zuzanka',
			'Johanka',
			'Marika',
			'Stefan',
			'Anicka',
			'Marienka'
			'Marek',
			'Simon'
		];

		foreach($kamarati as $kamarat) {
				echo '<tr class="big"><td>';
				echo $kamarat;
				echo '</td></tr>';
		}
		*/



		$jedlo1 = (object) [
			'nazov' => 'polievka',
			'cena' => '10 eur',
			'sefkuchar' => 'Jozo',
			'bezlepkove' => true,
		];
		$jedlo2 = (object) [
			'nazov' => 'rezen',
			'cena' => '20 eur',
			'sefkuchar' => 'Jano',
			'bezlepkove' => true,
		];
		$jedlo3 = (object) [
			'nazov' => 'ryba',
			'cena' => '11 eur',
			'sefkuchar' => 'Zuzanka',
			'bezlepkove' => false,
		];
		$jedlo4 = (object) [
			'nazov' => 'ryba',
			'cena' => null,
			'sefkuchar' => 'Zuzanka',
			'bezlepkove' => false,
		];


		$jedalnyListok = [
			'pondelok' => $jedlo1,
			'utorok' => $jedlo2,
			'streda' => $jedlo3,
			'stvrtok' => $jedlo4,
		];

		foreach ($jedalnyListok as $den => $jedlo) {
			//if ($jedlo->bezlepkove === true) {
				echo '<tr><td>'
				. $den
				. '</td><td>'
				. $jedlo->nazov
				. '</td><td>';

				echo $jedlo->cena
				. '</td><td>'
				. $jedlo->sefkuchar
				. '</td><td>'
				. ($jedlo->bezlepkove ? 'ano' : 'nie')
				. '</td></tr>';
			//}

		}

	?>
</table>


<?php

// array functions - implode, explode, shift, pop, shuffle, ...
// while
// easy objects
// null value, isset, empty difference
// citanie kodu + funny programming
// vypisat jedlo na dnesny den
// vypisat 1 nahodne jedlo z jedalneho listka


?>

  </body>
</html>