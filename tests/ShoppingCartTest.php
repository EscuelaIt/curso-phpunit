<?php

namespace Tests;

use App\Product;
use App\ShoppingCart;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ShoppingCartTest extends TestCase {
  
  #[Test]
  public function emptyCartReturnsFalseOnHasProducts() {
    $cart = new ShoppingCart();
    $this->assertFalse($cart->hasProducts());
  }

  #[Test]
  public function notEmptyCartReturnsTrueOnHasProducts() {
    $cart = new ShoppingCart();
    $cart->addProduct( new Product('Ratón ergonómico', 80));
    $this->assertTrue($cart->hasProducts());
  }
  
}