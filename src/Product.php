<?php

namespace App;

class Product {

  private $tax = 21;

  public function __construct(private $name, private $price) {
    $this->price = (float) $price;
  }

  public function getPrice() {
    return $this->price;
  }

  public function getTaxes() {
    $taxesCalculator = new TaxesCalculator();
    return $taxesCalculator->getTax($this->price, $this->tax);
  }

  public function getPricePlusTaxes() {
    $taxesCalculator = new TaxesCalculator();
    return $taxesCalculator->getValuePlusTax($this->price, $this->tax);
  }

  public function getSummary() {
    return "{$this->name}: {$this->price}";
  }

}