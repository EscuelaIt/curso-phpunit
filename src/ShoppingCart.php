<?php

namespace App;

use Exception;

class ShoppingCart {

  private $products = [];

  public function hasProducts() {
    return count($this->products) > 0;
  }

  public function addProduct(Product $product) {
    $this->products[] = $product;
  }

  public function getProducts(): array {
    return $this->products;
  }

  public function removeProduct($product) {
    $index = array_search($product, $this->products, true);
    if($index === false) {
      throw new Exception('El producto no está en el carrito');
    }
    unset($this->products[$index]);
  }
}