---------------
DB:
- fulltext search
	- like %
- indexes

Tasks:
- getById() cez DB
- podstranku /book z DB
- getByIds()
- rand

- strankovanie
  getCount()

- objednavky tabulka (user_id NULL)

- ulozenie objednavky do DB
  - __sleep()

- kniha - autor join - foreign keys

- parametre do getBooks - ids, order (default rand()), search


- pridat formular, ktory ma moznosti na filtrovanie = search, cena od - do, limit, order/sort (GET params)
    preposielanie parametrov - napr. limit zo search do getBooks

     pre kazdy filter/sort pouzite vlastnu funckiu (ktora samozrejme moze pouzivat php funkcie), napr. sortArticlesByPrice()

- podstranku /registracia
- podstranku login
  header('Location: ' . $_SERVER['REQUEST_URI']);
- podstranku /admin/login

- podstranka /user/details
- podstranka /user/objednavky
