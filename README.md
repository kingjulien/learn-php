---------------
DB:
- config file

SQL:
- structure
- create, insert (foreach)
- select from db ...
- fulltext search

PDO:
- make connection
- global $db; (singleton)
- prepare - sql injection example (login)
- fetchObject

Tasks:
- class Knihy - getBooksByIds()
- class Kniha - getById() cez DB

- pridat formular, ktory ma moznosti na filtrovanie = search, cena od - do, limit, order/sort (GET params)
    preposielanie parametrov - napr. limit zo search do getBooks

     pre kazdy filter/sort pouzite vlastnu funckiu (ktora samozrejme moze pouzivat php funkcie), napr. sortArticlesByPrice()

- pouzitim SESSION, aby pri vrateni sa na podstanku, bolo v policku pre vyhladavanie vo formulari to co som predtym hladal

- podstranku /registracia
- podstranku login
  header('Location: ' . $_SERVER['REQUEST_URI']);
- podstranku /admin/login

- objednavky tabulka (user_id NULL)
- ulozenie objednavky do DB
  - __sleep()

- kniha - autor join