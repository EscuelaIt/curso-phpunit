<?php

namespace App;

class TaxesCalculator {
  public function getTax($value, $tax) {
    return round($value * $tax / 100, 2);
  }

  public function getValuePlusTax($value, $tax) {
    return $value + $this->getTax($value, $tax);
  }
}