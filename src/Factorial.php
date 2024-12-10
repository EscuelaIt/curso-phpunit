<?php

namespace App;

class Factorial {
  public function calculate($input) {
    if($input < 0) {
      return -1;
    }
    if($input <= 1) {
      return 1;
    }
    return $input * $this->calculate($input - 1);
  }
}