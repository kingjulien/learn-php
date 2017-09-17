<?=$chyba ?>

<form action="/registracia" method="post">

<input type="text" name="meno" required value="<?= $meno ?>" placeholder="Vase meno">
<input type="email" name="email" value="" placeholder="Vas email">
<input type="text" name="telefon" value="" placeholder="Vas telefon">

<input type="password" name="heslo1" value="" placeholder="vase heslo">
<input type="password" name="heslo2" value="" placeholder="zopakujte heslo">

Vasa adresa: <textarea name="adresa"></textarea>
<input type="submit" name="registruj" value="Registruj sa"/>
</form>