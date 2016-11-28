<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if ($oldCart) {
			$this->items = $oldCart->items;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function addToCart($item, $id)
	{
		$storedItem = [
			'item' => $item,
			'quantity' => 0,
			'price' => $item->price
		];

		if ($this->items) {
			if (array_key_exists($id, $this->items)) {
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['quantity']++;
		$storedItem['price'] = $storedItem['quantity'] * $item->price;
		$this->items[$id] = $storedItem;
		$this->totalPrice += $item->price;
	}

	public function deleteFromCart($id)
	{
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);		
	}	
}