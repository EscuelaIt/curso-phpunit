<?php

namespace Tests;

use Exception;
use App\Product;
use App\ShoppingCart;
use App\PaymentService;
use App\NotificationService;
use PHPUnit\Framework\TestCase;
use Tests\Doubles\FakePaymentService;
use PHPUnit\Framework\Attributes\Test;

class ShoppingCartTest extends TestCase {
  
  protected $cart;

  protected function setUp(): void {
    // $paymentService = new FakePaymentService();
    $paymentService = $this->createStub(PaymentService::class);
    $paymentService->method('processPayment')->willReturn(true);
    $notificationService = $this->createMock(NotificationService::class);
    $this->cart = new ShoppingCart($paymentService, $notificationService);
    $this->cart->addProduct( new Product('Ratón ergonómico', 80));
    $this->cart->addProduct( new Product('Teclado inalámbrico', 105));
  }

  private function createEmptyShoppingCart() {
    // $paymentService = new FakePaymentService();
    $paymentService = $this->createStub(PaymentService::class);
    $notificationService = $this->createMock(NotificationService::class);
    $this->cart = new ShoppingCart($paymentService, $notificationService);
  }

  #[Test]
  public function emptyCartReturnsFalseOnHasProducts() {
    $this->createEmptyShoppingCart();
    $this->assertFalse($this->cart->hasProducts());
  }

  #[Test]
  public function notEmptyCartReturnsTrueOnHasProducts() {
    $this->assertTrue($this->cart->hasProducts());
  }
  
  #[Test]
  public function cartHasAnEmptyArrayOfProducts() {
    $this->createEmptyShoppingCart();
    $this->assertIsArray($this->cart->getProducts());
    $this->assertEmpty($this->cart->getProducts());
  }

  #[Test]
  public function cartHasCorrectNumberOfProducs() {
    $this->assertCount(2, $this->cart->getProducts());
  }

  #[Test]
  public function cartHasAnAddedProduct() {
    $screen = new Product('Pantalla 4K', 250);
    $this->cart->addProduct($screen);
    $this->assertCount(3, $this->cart->getProducts());
    $this->assertContains($screen, $this->cart->getProducts());
  }

  #[Test]
  public function cartHasNotAnAddedProduct() {
    $screen = new Product('Pantalla 4K', 250);
    $this->cart->addProduct($screen);
    $this->cart->removeProduct($screen);
    $this->assertCount(2, $this->cart->getProducts());
    $this->assertNotContains($screen, $this->cart->getProducts());
  }

  #[Test]
  public function cartHasOnlyProducts() {
    $screen = new Product('Pantalla 4K', 250);
    $this->cart->addProduct($screen);
    $this->assertContainsOnlyInstancesOf(Product::class, $this->cart->getProducts());
  }

  #[Test]
  public function removeProductThatIsNotInCartThrowsException() {
    $screen = new Product('Pantalla 4K', 250);
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('El producto no está en el carrito');
    $this->cart->removeProduct($screen);
  }

  #[Test]
  public function checkoutMarkCartAsPaid() {
    $this->cart->checkout();
    $this->assertTrue($this->cart->isPaid());
  }
}