<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalPrice = 0;

	/**
	 * Constructor for the Cart that allows you to to reassing old cart values
	 * to new cart object.
	 * @param Cart $oldCart 
	 */
	public function __construct($oldCart)
	{
		if ($oldCart) {
			$this->items = $oldCart->items;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function getItems()
	{
		return $this->items;
	}

	public function getTotalPrice()
	{
		return $this->totalPrice;
	}
			
	/**
	 * Add to cart given item and recalculate total price.
	 * @param Product $item 
	 * @param Integer $id   Product ID
	 */
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

	/**
	 * Delete product with that id from cart and recalculate total price.
	 * @param  Integer $id Product ID
	 */
	public function deleteFromCart($id)
	{
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);		
	}
}