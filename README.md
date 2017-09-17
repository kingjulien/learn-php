Classes:
- Kniha extends Products (pocetStran, ...)
-  inheritance - Automobil extends Products

podstranku /cart (kosik)
    - zobrazi produkty v kosiku

- pridanie do kosika

- pridajte checkbox - ze ktore knihy chcem, po kliku presmeruje na podstranku /cart
- na podstranke /kosik checkboxy, ktore odstrania zo session

- strankovanie na /books (po 10)
    - funkciu

class Kosik (Cart)
    - __construct
    - ... (Kniha $kniha, $mnozstvo = 1)
    - addToCart(), removeFromCart(), getItems()
    - na stranke /cart vypisovat aj mnozstvo v kosiku, aj v headeri
    - vypisat celkovu sumu - Kosik::calculateSum()




--
Error handling
try / catch - exceptions

