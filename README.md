# Kapitoly

##1 Úvod
1.1 Úvod - statické vs dynamické stránky (index.html vs index.php), flow
1.2 Čo sú backend jazyky a prečo PHP?
1.3 Čo sú frameworky, naco su a preco a ich pouzivat
1.4 localhost (127.0.0.1), AMP Stack (Apache, MySQL, PHP) (virtual boxes), /etc/hosts

##2 Zaklady programovania v php
2.0 rozmyslanie :)
zobrazenie PHP errorov a zmena php.ini nastavení
psr-2

###2.1 premenne/typy + (ne)typovost php, konstanty
    $a = 1;
    $b = '1';
    echo $b + $a;

    const AAA = 3;
    const AAA = 2;
    echo AAA + 2;

=== comparison , isset, empty difference

###2.2 cykly

###2.3 Arrays, objects - kedy co, ucel - array = list, object - properties + methods
Asociativne arrays

Vytvorenie => a praca s nimi (array functions - impode, explode, shift…)
	Zaklady s objektami ->
Pretypovanie v php …. (string) … (object)


##3 Pages
homepage.php, registration.php,....
rozbitie stránky na kúsky (componenty) - header, footer (include/require/..._once)
templates (php + html) - oddelenie vypoctu

##4 Functions
commenting
docblock (phpdoc)
kontrola typu vstupnych hodnot
…$params


##5 - Registracny formular

Spracovanie dát z formuláru, GET request, POST request, query string

Local global premenné, PHP $_SERVER a $GLOBALS
$_SERVER, status code


##6 Errors
Error handling (try/catch)
Error (fallback) page

##7 Regular expressions

##8 Classes
properties / types
methods / types
magic methods
creation of objects
inheritance


##9 Composer (packages, f.e. db, auth)
require / install / update
composer.json, composer.lock
Psr-4 (autoloading), namespaces
Examples - obrazky, generate pdf, QR code, …, twitter, fb api, …., cele frameworks


	bacon/bacon-qr-code
intervention/image praca s obrazkami
jurosh/pdf-merge spajanie pdf
laravel/laravel

aj npm trocha, ze ten isty princip - package.json
http://www.theregister.co.uk/2016/03/23/npm_left_pad_chaos/


##10 Middleware

##11,12,13,14 Databázy
vytvorenie
spojenie s DB z PHP
Tabulky
Typy hodnot, Keys
sql export/import (dump)

##15 CMS

dostylovanie 

##18 Fydy :)  (REST/CRUD)
headers
json
vytvorenie service
ajax z FE na php service (CORS)

##21 Authorization
headers
Registration - hash passwords

##22 Security
XSS, injection, CSRF

##24 bonuses
caching (file, memcache), etc..
