<?php

namespace Tests;

use App\Product;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ProductTest extends TestCase {
  
  #[Test]
  public function productHasNumericPrice() {
    $product = new Product('Ordenador Macbook Pro', 1299);
    $this->assertIsNumeric($product->getPrice());
  }

  #[Test]
  public function productHasAssignedPrice() {
    $product = new Product('Ordenador Macbook Pro', 1299);
    $this->assertSame(1299.00, $product->getPrice());
  }

  #[Test]
  public function productTaxesIsFloat() {
    $product = new Product('Ordenador Macbook Pro', 1299);
    $this->assertIsFloat($product->getTaxes());
  }
  
  #[Test]
  public function productTaxesIsCorrect() {
    $product = new Product('Ordenador Macbook Pro', 1299);
    $this->assertEquals(272.79, $product->getTaxes());
  }

  #[Test]
  public function productPlusTaxesIsCorrect() {
    $product = new Product('Ordenador Macbook Pro', 1299);
    $this->assertSame(1571.79, $product->getPricePlusTaxes());
  }

  #[Test]
  public function productSummaryContainsItsName() {
    $product = new Product('Ordenador Macbook Pro', 1299);
    $this->assertStringContainsString('Ordenador Macbook Pro', $product->getSummary());
  }

  #[Test]
  public function productSummaryContainsItsPrice() {
    $product = new Product('Ordenador Macbook Pro', 1299);
    $this->assertStringContainsString('1299', $product->getSummary());
  }
}