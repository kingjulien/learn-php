<?php
namespace Classes;

class Cart {

	const __CART__ = 'cart';

	protected static $items;

	public static function init() {
		// nieco co chcem aby sa spustilo
		// pri vytvoreni objektu

		self::$items = & $_SESSION[self::__CART__];

		if (!self::$items) {
			self::$items = [];
		}
	}

	public static function getItems() {
		
		return self::$items;
	}

    /*
    *  $_SESSION['cart'][4] = [
    *     'item' => { title => ..., id => 4, ... },
    *     'mnozstvo' => 1   
    *  ];
    *  
    */
	public static function addToCart(Product $kniha, $mnozstvo = 1) {
		if (!is_numeric($mnozstvo)) {
			throw new \Exception('Mnozstvo musi byt cislo');
		}

        // ked este nema knihu s takym id v kosiku, tak prida
		if (!isset(self::$items[$kniha->getId()])) {
			self::$items[$kniha->getId()] = [
				'item' => $kniha,
				'mnozstvo' => $mnozstvo
			];
		} else {
			// uz je v kosiku taka kniha, tak zvacsi mnozstvo
			self::$items[$kniha->getId()]['mnozstvo'] += $mnozstvo;
		}
	}





	public static function removeFromCart($idKnihy, $mnozstvo = 1) {
		self::$items[$idKnihy]['mnozstvo'] -= $mnozstvo;
		if (self::$items[$idKnihy]['mnozstvo'] < 1) {
			unset(self::$items[$idKnihy]);
		}
	}




	public static function getSum() {
		$suma = 0;

		foreach (self::$items as $nakup) {
			$mnozstvo = $nakup['mnozstvo'];
			$kniha = $nakup['item'];
			$cena = $kniha->price;
			// $title = $kniha->title;

			// $suma += $nakup['item']->price * $nakup['mnozstvo'];

			$suma = $suma + $cena * $mnozstvo;
		}

		return $suma;
	}
}
