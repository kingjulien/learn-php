<form action="/books" method="get">
  Filter: <input type="text" name="cena_od" placeholder="cena od">
  <input type="text" name="cena_do" placeholder="cena do">
  <input type="text" name="hladaj" placeholder="Hladaj...">
  <input type="submit" value="Filtruj">
</form>

<form action="/cart" method="post">
<table class="table">
  <tr>
    <th><a href="<?= zoradQueryString('nazov') ?>">Nazov</a></th>
    <th><a href="<?= zoradQueryString('cena') ?>">Cena</a></th><th>action</th>
  </tr>
  <?php
    foreach ($books as $book) {
    	echo '<tr>'
    	. '<td><a href="' . $book->getUrl() . '">' . $book->getTitle() . '</a>
    	  </td>'
    	. '<td>' . priceFormat($book->getPrice()) . '</td>
    	<td><input type="checkbox" name="doKosika[]" value="' . $book->getId()  . '" /></td>
    	</tr>';
    }
  ?>
</table>
<input type="submit" value="Vlozit do Kosika" name="vlozKnihy" />
</form>

<?= pagination( 'books', $pocetKnih, $itemsPerPage, $idPage ) ?>


V nasom eshope je <?= $pocetKnih ?> knih