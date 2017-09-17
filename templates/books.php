<table>
  <tr><th>Nazov</th><th>Cena</th></tr>
  <?php
    foreach ($books as $book) {
    	echo '<tr><td>'
    	. '<a href="' . $book->url . '">' . $book->title . '</a></td>'
    	. '<td>' . $book->price . '</td></tr>';
    }
  ?>
</table>