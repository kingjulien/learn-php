Kosik

Ak chcete aby sme mali vase udaje, <a href="/registracia">registrujte sa</a>.
(nikde ich nezneuzijeme)

<form action="/cart" method="post">

<input type="text" name="meno" value="<?= $meno ?>" placeholder="Vase meno">
<input type="email" name="email" value="<?= $email ?>" placeholder="Vas email">
<input type="text" name="telefon" value="<?= $telefon ?>" placeholder="Vas telefon">
Vasa adresa: <textarea name="adresa"><?= $adresa ?></textarea>

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

<tr>
<td>
  <input type="submit" value="Objednat" name="objednat" />
</td>
<td><?=$suma ?></td>
<td><?=$mnozstvo ?></td>
<td>
  <input type="submit" value="Zmazat" name="zmazat" />
</td>
</tr>

</table>

</form>