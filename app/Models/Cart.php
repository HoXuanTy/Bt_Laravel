<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $items = [];
  public $totalQty = 0;
  public $totalPrice = 0;

  public function __construct($oldCart = null)
  {
    if ($oldCart) {

      $this->items = $oldCart->items;
      $this->totalQty = $oldCart->totalQty;
      $this->totalPrice = $oldCart->totalPrice;
    }
  }

  public function add($item, $id, $qty = 1)
  {
    $cartItem = [
      'qty' => 0,
      'price' => $item->promotion_price != 0 ? $item->promotion_price : $item->unit_price,
      'item' => $item
    ];

    if (array_key_exists($id, $this->items)) {
      $cartItem = $this->items[$id];
    }

    $cartItem['qty'] += $qty;
    $cartItem['price'] = $cartItem['price'] * $cartItem['qty'];

    $this->items[$id] = $cartItem;
    $this->totalQty += $qty;
    $this->totalPrice += $cartItem['price'];
  }

  public function reduceByOne($id)
  {
    if (array_key_exists($id, $this->items)) {
      $this->items[$id]['qty']--;
      $this->items[$id]['price'] -= $this->items[$id]['item']->promotion_price != 0 ? $this->items[$id]['item']->promotion_price : $this->items[$id]['item']->unit_price;
      $this->totalQty--;
      $this->totalPrice -= $this->items[$id]['item']->promotion_price != 0 ? $this->items[$id]['item']->promotion_price : $this->items[$id]['item']->unit_price;

      if ($this->items[$id]['qty'] <= 0) {
        unset($this->items[$id]);
      }
    }
  }

  public function removeItem($id)
  {
    if (array_key_exists($id, $this->items)) {
      $this->totalQty -= $this->items[$id]['qty'];
      $this->totalPrice -= $this->items[$id]['price'];
      unset($this->items[$id]);
    }
  }
}
