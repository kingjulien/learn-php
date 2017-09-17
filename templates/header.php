<header>
<nav>
	<a href="/">Home</a>
	<a href="/books">Kniha</a>
</nav>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

    <label>login: <input type="text" name="login"></label>
    <label>heslo: <input type="password" name="heslo"></label>
    <input type="submit" value="Prihlasit" name="prihlas">

</form>
</header>