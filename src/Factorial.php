<?php

namespace App;

use InvalidArgumentException;

class Factorial {
  public function calculate($input) {
    if($input < 0) {
      throw new InvalidArgumentException('No es posible hacer un factorial de números negativos');
    }
    if($input <= 1) {
      return 6;
    }
    return $input * $this->calculate($input - 1);
  }
}