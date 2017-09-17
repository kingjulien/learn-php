<h2>Vase objednavky</h2>

<table>
<tr>
<th>Cislo</th>
<th>Adresa</th>
<th>Stav</th>
<th>Detail</th>
</tr>

<?php

$stavyObjednavok = [
	0 => 'objednane',
	1 => 'zaplatene',
	2 => 'odoslane',
	-1 => 'stornovana'
];

foreach ($objednavky as $objednavka) {
	?>
	<tr>
		<td><?= $objednavka['id'] ?></td>
		<td><?= $objednavka['kupujuci_adresa'] ?></td>
		<td><?= $stavyObjednavok[ $objednavka['stav'] ]?></td>
		<td><a href="/user/objednavka/<?= $objednavka['id'] ?>">Detail</a></td>
	</tr>
	<?php
}
?>
</table>
