<form action="/cart" method="post">
<table class="table">
  <tr><th>Nazov</th><th>Cena</th><th>action</th></tr>
  <?php
    foreach ($books as $book) {
    	echo '<tr>'
    	. '<td><a href="' . $book->getUrl() . '">' . $book->getTitle() . '</a>
    	  </td>'
    	. '<td>' . $book->getPrice() . '</td>
    	<td><input type="checkbox" name="doKosika[]" value="' . $book->getId()  . '" /></td>
    	</tr>';
    }
  ?>
</table>
<input type="submit" value="Vlozit do Kosika" name="vlozKnihy" />
</form>