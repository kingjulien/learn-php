Kosik

<form action="/cart" method="post">
<table class="table">
  <tr><th>Nazov</th><th>Cena</th><th>Mnozstvo</th><th>action</th></tr>
  <?php
    foreach ($knihyVKosiku as $infoOKnihe) {
    	$book = $infoOKnihe['item'];
    	$mnozstvo = $infoOKnihe['mnozstvo'];
    	echo '<tr>'
    	. '<td><a href="' . $book->getUrl() . '">' . $book->getTitle() . '</a>
    	  </td>'
    	. '<td>' . $book->getPrice() . '</td>
    	<td>' . $mnozstvo . '</td>'
    	. '<td><input type="checkbox" name="zKosika[]" value="' . $book->getId()  . '" /></td>
    	</tr>';
    }
  ?>
</table>
<input type="submit" value="Zaplatit" name="zaplat" />
</form>