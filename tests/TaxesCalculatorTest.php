<?php

namespace Tests;

use App\TaxesCalculator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

class TaxesCalculatorTest extends TestCase {
  
  protected $taxesCalculator;

  protected function setUp(): void {
    $this->taxesCalculator = new TaxesCalculator();
  }

  public static function valuesAndTaxesProvider(): array {
    return [
      'Tax 21% of 100'  => [100, 21, 21],
      'Tax of zero' => [0, 10, 0],
      'Tax rounded' => [1.42, 10, 0.14],
    ];
  }

  #[Test]
  #[DataProvider('valuesAndTaxesProvider')]
  public function calculatesCorrectIvaForGivenValue($value, $tax, $expected) {
    $tax = $this->taxesCalculator->getTax($value, $tax);
    $this->assertEquals($expected, $tax);
  }

  public static function valuesPlusTaxesProvider(): array {
    return [
      'Tax 21% of 100'  => [100, 21, 121],
      'Tax of zero' => [0, 10, 0],
      'Tax rounded' => [1.42, 10, 1.56],
    ];
  }

  #[Test]
  #[DataProvider('valuesPlusTaxesProvider')]
  public function calculatesCorrectIvaPlusTaxesForGivenValue($value, $tax, $expected) {
    $tax = $this->taxesCalculator->getValuePlusTax($value, $tax);
    $this->assertEquals($expected, $tax);
  }
}