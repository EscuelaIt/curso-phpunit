<?php

namespace Tests;

use Exception;
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
  
  // #[Test]
  // public function cartHasAnArrayOfProducts() {
  //   $cart = new ShoppingCart();
  //   $this->assertIsArray($cart->getProducts());
  // }
  
  #[Test]
  public function cartHasAnEmptyArrayOfProducts() {
    $cart = new ShoppingCart();
    $this->assertIsArray($cart->getProducts());
    $this->assertEmpty($cart->getProducts());
  }

  #[Test]
  public function cartHasCorrectNumberOfProducs() {
    $cart = new ShoppingCart();
    $cart->addProduct( new Product('Ratón ergonómico', 80));
    $cart->addProduct( new Product('Teclado inalámbrico', 105));
    $this->assertCount(2, $cart->getProducts());
  }

  #[Test]
  public function cartHasAnAddedProduct() {
    $cart = new ShoppingCart();
    $cart->addProduct( new Product('Ratón ergonómico', 80));
    $cart->addProduct( new Product('Teclado inalámbrico', 105));
    $screen = new Product('Pantalla 4K', 250);
    $cart->addProduct($screen);
    $this->assertCount(3, $cart->getProducts());
    $this->assertContains($screen, $cart->getProducts());
  }

  #[Test]
  public function cartHasNotAnAddedProduct() {
    $cart = new ShoppingCart();
    $cart->addProduct( new Product('Ratón ergonómico', 80));
    $cart->addProduct( new Product('Teclado inalámbrico', 105));
    $screen = new Product('Pantalla 4K', 250);
    $cart->addProduct($screen);
    $cart->removeProduct($screen);
    $this->assertCount(2, $cart->getProducts());
    $this->assertNotContains($screen, $cart->getProducts());
  }

  #[Test]
  public function cartHasOnlyProducts() {
    $cart = new ShoppingCart();
    $cart->addProduct( new Product('Ratón ergonómico', 80));
    $cart->addProduct( new Product('Teclado inalámbrico', 105));
    $screen = new Product('Pantalla 4K', 250);
    $cart->addProduct($screen);
    $this->assertContainsOnlyInstancesOf(Product::class, $cart->getProducts());
  }

  #[Test]
  public function removeProductThatIsNotInCartThrowsException() {
    $cart = new ShoppingCart();
    $cart->addProduct( new Product('Ratón ergonómico', 80));
    $cart->addProduct( new Product('Teclado inalámbrico', 105));
    $screen = new Product('Pantalla 4K', 250);
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('El producto no está en el carrito');
    $cart->removeProduct($screen);
  }
}