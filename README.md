- pridat formular, ktory ma moznosti na filtrovanie = search, cena od - do, limit, order/sort (GET params)
    preposielanie parametrov - napr. limit zo search do getBooks


---------------
Tasks:
- strankovanie
  getCount() - SELECT COUNT(*) FROM products
- vyhladavanie
	- fulltext search
		- like %
	- indexes

- filtrovanie , napr. cena od - do
	- getBooks - nastavit do $this->books (kvoli getCount())



- objednavky tabulka (user_id NULL)
- ulozenie objednavky do DB
- kniha - autor join - foreign keys, indexes
- sql export/import (dump)


- podstranku /registracia
- podstranku login
  header('Location: ' . $_SERVER['REQUEST_URI']);

- podstranka /logout
- podstranku /admin/login

- podstranka /user/details
- podstranka /user/objednavky

- na kosiku, ci je prihlaseny, ked hej, tak predyplnit jeho udaje do form
