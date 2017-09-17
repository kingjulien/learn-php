- CORS - headers
  (co je CORS)

- podstranku /registracia - cez mvc flow
	
- sessions / cookies

- podstranku login
  header('Location: ' . $_SERVER['REQUEST_URI']);
- podstranku /admin/login


Tasks:
- pridat podstranku /login - cez mvc flow

Pouzitie session/cookies:
- na podstranke 'detail produktu' pridajte button pridat do kosika

- pouzitim SESSION, aby pri vrateni sa na podstanku, bolo v policku pre vyhladavanie vo formulari to co som predtym hladal

- vo footeri vypisat zoznam naposledy pozeranych knih (kazdu len raz) a nech si to pamata 1 tyzden


Domaca uloha: Hra 'uhadni cislo' - vytvorit formular, cez ktory bude mozne hadat nahodne vygenerovane cislo. Cislo sa vygeneruje pri prvom nacitani stranky (ulozi sa do SESSION). Pri neuhdanuti cisla, vypiste cloveku ci to jeho cislo je vacsie alebo mensie. Pri uhadnuti cisla, vypiste, na ktory pokus ho uhadol (pripadne aj historiu hadanych cisiel).

-----------------
- pridat formular, ktory ma moznosti na filtrovanie = search, cena od - do, limit, order/sort (GET params)
	preposielanie parametrov - napr. limit zo search do getBooks

- pre kazdy filter/sort pouzite vlastnu funckiu (ktora samozrejme moze pouzivat php funkcie), napr. sortArticlesByPrice()


------------

