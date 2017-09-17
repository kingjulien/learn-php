<header>
<nav>
	<a href="/">Home</a>
	<a href="/books">Kniha</a>
</nav>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

<?php
$user = new Classes\User;
if($user->isLoggedIn()) {
  $prihlaseny = $user->getLoggedUser();

  // jeho meno a odhlasit button
  echo 'Vitaj, ' . $prihlaseny->meno;
  echo '<a href="/user/objednavky">Vase objednavky</a>';
  echo '<input type="submit" value="Odhlasit" name="odhlas">';

} else { // tu zacina
// nie je prihlaseny
?>
    <label>login: <input type="text" name="login"></label>
    <label>heslo: <input type="password" name="heslo"></label>
    <input type="submit" value="Prihlasit" name="prihlas">

<?php
} // a tu konci
?>

</form>
</header>