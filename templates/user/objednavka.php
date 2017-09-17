<?php
if (isset($objednavka['id'])) {
?>

Objednavka id: <?= $objednavka['id'] ?>
<a href="/user/faktura/<?= $objednavka['id'] ?>">PDF faktura</a>

<?php
} else {
?>
Objednavka nenajdena
<?php 
}