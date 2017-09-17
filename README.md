+ podstranku /registracia
	+ registracia.php
	+ ci uz existuje clovek, s takym loginom (nesmu mat 2 rovnaky)

+ v headeri ak je prihlaseny, tak jeho meno vypisat a logout, ak nie je, tak login form
  + middleware/login.php ('middleware')

+ na kosiku - formular s udajmi uzivatela - ak je prihlaseny, tak predvyplnit jeho udaje do form ($user->getLoggedUser())
  ulozenie objednavky do DB uz aj user_id

+ user class - login, logout, ....
  + header('Location: ' . $_SERVER['REQUEST_URI']);

- podstranka /user/objednavky
	- klik na /user/objednavka - pdf (mpdf/mpdf) - faktura.php
- podstranka /user/details (moze zmenit)

- regex na routes /user /admin - iba ked je prihlaseny

- kniha - autor join

- /admin
- /admin/login
- /admin/products
	- zoznam
- /admin/product
	- formular na pridat/upravit
	- file upload - helpers/upload.php
- /admin/objednavky
	- edit

- email send
http://php.net/manual/en/function.mail.php
http://swiftmailer.org/docs/introduction.html

- payments - https://github.com/tomaj/EPayment/wiki/Ako-pou%C5%BEiva%C5%A5-PHP


- REST + js datatable