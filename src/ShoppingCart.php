<?php

namespace App;

class ShoppingCart {

  private $products = [];

  public function hasProducts() {
    return count($this->products) > 0;
  }

  public function addProduct(Product $product) {
    $this->products[] = $product;
  }
}